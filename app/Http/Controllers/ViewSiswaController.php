<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;

class ViewSiswaController extends Controller
{
    public function indexSMP()
    {
        $siswas = siswa::where('jenjang', 'SMP')->get();
        return view('viewSiswa', compact('siswas'));
    }

    public function indexSMA()
    {
        $siswas = siswa::where('jenjang', 'SMA')->get();
        return view('viewSiswa', compact('siswas'));
    }

    public function indexSMK()
    {
        $siswas = siswa::where('jenjang', 'SMK')->get();
        return view('viewSiswa', compact('siswas'));
    }
}
