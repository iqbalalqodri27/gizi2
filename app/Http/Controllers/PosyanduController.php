<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;
use App\Models\Child;
class PosyanduController extends Controller
{
    public function index()
    {
       $posyandus = Posyandu::with('Child')->get();
       $children = Child::orderBy('created_at','DESC')->get();

       return view('layouts.posyandus.index',compact('posyandus','children'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.mothers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            // dd($request->created_at);

            $timestamp = strtotime($request->created_at);

            $month = date('m', $timestamp);

            $posyandu = Posyandu::where('child_id', $request->child_id)
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $request->created_at)
            ->exists();

        if ($posyandu) 
        {
            
            return redirect()->route('dataposyandu.index')->with('CekData','Data Anak Di bulan Tersebut Sudah Ada !!');

         }
         else{

        $str = $request->child_id;
        $newStr = explode("-", $str);
        $child_id = $newStr[0];
        $usia_bulan = $newStr[1];

            $Posyandu = new Posyandu;
            $Posyandu->child_id = $child_id;
            $Posyandu->berat_badan = $request->berat_badan;
            $Posyandu->tinggi_badan = $request->tinggi_badan;
            $tinggi_badan = $request->tinggi_badan / 100;
            $Posyandu->lingkaran_kepala = $request->lingkaran_kepala;
            $Posyandu->status = $request->status;
            $Posyandu->created_at  = $request->created_at;
            $Posyandu->kalkulasi_bmi = $Posyandu->berat_badan / ($tinggi_badan * $tinggi_badan) ;



                $tb  = $request->tinggi_badan/100;
                $bb  = $request->berat_badan;

                /* Rumus BMI adalah:
                BMI = BERAT BADAN / KUADRAT TINGGI BADAN
                */   

                $bmi = $bb / ($tb * $tb);
            
            if (($Posyandu->kalkulasi_bmi) < 11.00)
            {
                $Posyandu->bmi = 'Stunting';
            }
            elseif (($Posyandu->kalkulasi_bmi >= 15.00) && ($Posyandu->kalkulasi_bmi <= 18.00))
            {
                $Posyandu->bmi = 'Normal';
            }
            elseif (($Posyandu->kalkulasi_bmi >= 19.00) && ($Posyandu->kalkulasi_bmi <= 22.00))
            {
                $Posyandu->bmi = 'Obisitas';
            }
                
            $Posyandu->save();
            return redirect()->route('dataposyandu.index')->with('success','Tambah Data Posyandu Berhasil');
         }
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $timestamp = strtotime($request->created_at);

        // $month = date('m', $timestamp);

        // $posyandu = Posyandu::where('child_id', $request->child_id)
        // ->whereMonth('created_at', '=', $month)
        // ->whereYear('created_at', '=', $request->created_at)
        // ->exists();

        // if ($posyandu) 
        // {
            
        //     return redirect()->route('dataposyandu.index')->with('CekData','Data Anak Di bulan Tersebut Sudah Ada !!');

        //  }
        
        
        $Posyandu = Posyandu::findOrFail($id);

        $str = $request->child_id;
        $newStr = explode("-", $str);
        $child_id = $newStr[0];
        $usia_bulan = $newStr[1];
        // dd($newStr);

            // $Posyandu->child_id = $child_id;
            // $Posyandu->berat_badan = $request->berat_badan;
            // $Posyandu->tinggi_badan = $request->tinggi_badan;
            // $tinggi_badan = $request->tinggi_badan / 100;
            // $Posyandu->lingkaran_kepala = $request->lingkaran_kepala;
            // $Posyandu->status = $request->status;
            // $Posyandu->created_at  = $request->created_at;
            // $Posyandu->kalkulasi_bmi = $Posyandu->berat_badan / ($tinggi_badan * $tinggi_badan);


            if($usia_bulan >= 12) {

            $Posyandu->child_id = $child_id;
            $Posyandu->berat_badan = $request->berat_badan; 
            $Posyandu->tinggi_badan = $request->tinggi_badan;
            $Posyandu->lingkaran_kepala = $request->lingkaran_kepala;
            $Posyandu->status = $request->status;
            $Posyandu->created_at  = $request->created_at;
            $Posyandu->kalkulasi_bmi = $Posyandu->berat_badan / ($tinggi_badan * $tinggi_badan);

                $angka = $usia_bulan;
                $angka_format = number_format($angka,1,".");
                dd($da);
                

                // $IMT = 2 * $usia_bulan + 8;
            }
            $Posyandu->save();




                // $tb  = $request->tinggi_badan/100;
                // $bb  = $request->berat_badan;
                
                /* Rumus BMI adalah:
                BMI = BERAT BADAN / KUADRAT TINGGI BADAN
                */   

            //     $bmi = $bb / ($tb * $tb);
            
            // if (($Posyandu->kalkulasi_bmi) < 11.00)
            // {
            //     $Posyandu->bmi = 'Stunting';
            // }
            // elseif (($Posyandu->kalkulasi_bmi >= 15.00) && ($Posyandu->kalkulasi_bmi <= 18.00))
            // {
            //     $Posyandu->bmi = 'Normal';
            // }
            // elseif (($Posyandu->kalkulasi_bmi >= 19.00) && ($Posyandu->kalkulasi_bmi <= 22.00))
            // {
            //     $Posyandu->bmi = 'Obisitas';
            // }
                
            // $Posyandu->save();
        return redirect()->route('dataposyandu.index')->with('successUpdate','Update Data Posyandu Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Posyandu = Posyandu::findOrFail($id);
        $Posyandu->delete();
        return redirect()->route('dataposyandu.index')->with('successDelete','Hapus Data Posyandu Berhasil');
    }
}
