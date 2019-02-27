<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;

class ProfilController extends Controller
{
    public function index($id)
    {
        $profil = siswa::where('id_siswa',$id)->first();
        
        return view('profilSiswa', compact('profil'));
    }
}
