<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mapel;

class InputMapelController extends Controller
{
    public function index()
    {
        return view('inputMapel');
    }

    public function save(Request $request)
    {
        $mapel = new mapel();
        $mapel->mapel = $request->mapel;
        $mapel->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return redirect()->route('mapel-baru');
    }
}
