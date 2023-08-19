<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;
use App\Models\Antropometri;
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

            if($usia_bulan > 0) {

                $Antropometri = Antropometri::where('umur',$usia_bulan)->first();
        
                $umur = $Antropometri->umur;
                $median = $Antropometri->median;
                $plus_satu_sd = $Antropometri->plus_satu_sd;
                // dd($umur,$median,$plus_satu_sd);
                // dd($Antropometri);    
            $Posyandu = new Posyandu;
            $Posyandu->child_id = $child_id;
            $Posyandu->berat_badan = $request->berat_badan; 
            $Posyandu->tinggi_badan = $request->tinggi_badan;
            $tinggi_badan = $request->tinggi_badan;
            $Posyandu->lingkaran_kepala = $request->lingkaran_kepala;
            $Posyandu->status = $request->status;
            $Posyandu->created_at  = $request->created_at;

                
                $tb = $request->tinggi_badan;
                $bb = $request->berat_badan;
                $BMI = $bb / $tb / $tb;
                $IMT = round($BMI, 2);
                // dd($IMT);
                
                $Z_Score1 = $IMT - $median;
                $Z_Score2 = $plus_satu_sd - $median;

                $Z_Score_Final =  $Z_Score1 / $Z_Score2;
                $Z_Score_Round =round($Z_Score_Final, 2);
                $Posyandu->kalkulasi_bmi = $Z_Score_Round;
                // dd($Z_Score_Round);

                if ($Z_Score_Round <= -2) {

                    $Posyandu->bmi = 'Stunting';
                    // dd('kurus');
                }elseif ($Z_Score_Round <= 2) {
                    $Posyandu->bmi = 'Normal';
                    // dd('Normal');
                }elseif($Z_Score_Round >2){
                    $Posyandu->bmi = 'Obisitas';
                    // dd('Obisitas');
                }

                $Posyandu->save();
            }

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

        

        $Posyandu = Posyandu::findOrFail($id);

        $str = $request->child_id;
        $newStr = explode("-", $str);
        $child_id = $newStr[0];
        $usia_bulan = $newStr[1];
        // dd($usia_bulan);

            if($usia_bulan > 0) {

                $Antropometri = Antropometri::where('umur',$usia_bulan)->first();
        
                $umur = $Antropometri->umur;
                $median = $Antropometri->median;
                $plus_satu_sd = $Antropometri->plus_satu_sd;
                // dd($umur,$median,$plus_satu_sd);
                // dd($Antropometri);    

            $Posyandu->child_id = $child_id;
            $Posyandu->berat_badan = $request->berat_badan; 
            $Posyandu->tinggi_badan = $request->tinggi_badan;
            $tinggi_badan = $request->tinggi_badan;
            $Posyandu->lingkaran_kepala = $request->lingkaran_kepala;
            $Posyandu->status = $request->status;
            $Posyandu->created_at  = $request->created_at;

                
                $tb = $request->tinggi_badan;
                $bb = $request->berat_badan;
                $BMI = $bb / $tb / $tb;
                $IMT = round($BMI, 2);
                // dd($IMT);
                
                $Z_Score1 = $IMT - $median;
                $Z_Score2 = $plus_satu_sd - $median;

                $Z_Score_Final =  $Z_Score1 / $Z_Score2;
                $Z_Score_Round =round($Z_Score_Final, 2);
                $Posyandu->kalkulasi_bmi = $Z_Score_Round;

                // dd($Z_Score_Round);

                if ($Z_Score_Final <= -2) {

                    $Posyandu->bmi = 'Stunting';
                    // dd('kurus');
                }elseif ($Z_Score_Final <= 2) {
                    $Posyandu->bmi = 'Normal';
                    // dd('Normal');
                }elseif($Z_Score_Final >2){
                    $Posyandu->bmi = 'Obisitas';
                    // dd('Obisitas');
                }

                $Posyandu->save();
            }
            




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
