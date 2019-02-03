<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kelas;

class InputKelasController extends Controller
{
    public function index()
    {
        return view('inputKelas');
    }

    public function save(Request $request)
    {
        $kelas = new kelas();
        $kelas->kelas = $request->kelas;
        $kelas->jumlahMurid =  $request->jumlahMurid;
        $kelas->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return redirect()->route('kelas-baru');
    }
}
