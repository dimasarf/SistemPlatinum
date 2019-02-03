<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tentor;

class InputTutorController extends Controller
{
    public function index()
    {
        return view('inputTutor');
    }

    public function save(Request $request)
    {
        $tentor = new tentor();
        $tentor->tentor = $request->namaLengkap;
        $tentor->tglGabung = $request->tanggal;
        $tentor->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return redirect()->route('tutor-baru');
    }
}
