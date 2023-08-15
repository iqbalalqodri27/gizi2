<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Mothers;
class ChildController extends Controller
{
    public function index()
    {
       $childs = Child::orderBy('created_at','DESC')->get();
       return view('layouts.children.index',compact('childs'));

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

            $timestamp = strtotime($request->tanggal_lahir);

            $tahun = date('Y', $timestamp);
            $bulan = date('m', $timestamp);
            // dd($tahun,$bulan);
            $tahun_sekarang = date('Y');
            $bulan_sekarang = date('m');

            // dd($tahun_sekarang,$bulan_sekarang);
            $usia =($tahun_sekarang-$tahun)*12+$bulan_sekarang-$bulan;

            $Child = new Child;
            $Child->nama = $request->nama;
            $Child->nik = $request->nik;    
            $Child->tempat_lahir = $request->tempat_lahir;    
            $Child->tanggal_lahir =$request->tanggal_lahir;     
            $Child->usia = $usia;    
            $Child->jenis_kelamin = $request->jenis_kelamin;    
            $Child->nama_ot = $request->nama_ot;    
            $Child->nik_ot = $request->nik_ot;    
            $Child->alamat_ot = $request->alamat_ot;    
            $Child->no_tlp_ot = $request->no_tlp_ot;    
            $Child->save();
        return redirect()->route('dataanak.index')->with('success','Tambah Data Anak Berhasil');
    
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $timestamp = strtotime($request->tanggal_lahir);

            $tahun = date('Y', $timestamp);
            $bulan = date('m', $timestamp);
            // dd($tahun,$bulan);
            $tahun_sekarang = date('Y');
            $bulan_sekarang = date('m');

            // dd($tahun_sekarang,$bulan_sekarang);
            $usia =($tahun_sekarang-$tahun)*12+$bulan_sekarang-$bulan;


            $Child = Child::find($id);
            $Child->nama = $request->nama;
            $Child->nik = $request->nik;    
            $Child->tempat_lahir = $request->tempat_lahir;    
            $Child->tanggal_lahir =$request->tanggal_lahir;     
            $Child->usia = $usia;    
            $Child->jenis_kelamin = $request->jenis_kelamin;    
            $Child->nama_ot = $request->nama_ot;    
            $Child->nik_ot = $request->nik_ot;    
            $Child->alamat_ot = $request->alamat_ot;    
            $Child->no_tlp_ot = $request->no_tlp_ot;    
            $Child->save();
        return redirect()->route('dataanak.index')->with('successUpdate','Update Data Anak Berhasil');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        $childs = child::findOrFail($id);
        $childs->delete();
        return redirect()->route('dataanak.index')->with('successDelete','Hapus Data Anak Berhasil');
    }

}
