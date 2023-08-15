<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
use Carbon\Carbon;



class ChartJSController extends Controller

{

    /**
     * Write code on Method
     *
     * @return response()
     */

        public function index(Request $request)
        {
          if (isset($request->bulan)) {
            $posyandu = Posyandu::select(DB::raw("COUNT(*) as count"), DB::raw("bmi as bmi_status"))
            ->whereYear('created_at', '=', $request->tahun)
            ->whereMonth('created_at','=', $request->bulan)
            ->groupBy(DB::raw("bmi_status"))
            ->orderBy('id','ASC')
            ->pluck('count', 'bmi_status');

            // dd($posyandu);

            $labels = $posyandu->keys();
            // dd($labels);
            $data = $posyandu->values();
            // dd($data);
            $bulan = $request->bulan;
            $tahun = $request->tahun;
          
          
        return view('chart', compact('data', 'labels','bulan','tahun'));

          }else{
            $posyandu = Posyandu::select(DB::raw("COUNT(*) as count"), DB::raw("bmi as bmi_status"))
                        ->whereMonth('created_at', '00')
                        ->groupBy(DB::raw("bmi_status"))
                        ->orderBy('id','ASC')
                        ->pluck('count', 'bmi_status');

                        $labels = ['Normal','Stunting','Obisitas'];
                        $data = $posyandu->values();

            return view('chart', compact('data', 'labels'));

          }

          
        
}

}
