<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\pembayaran;
use DB;

class PembayaranController extends Controller
{
    public function index()
    {
        return view('searchStudentPayment');
    }

    public function cari(Request $request)
    {
        $siswas = DB::table('siswas')
                  ->where('siswas.id_siswa','like', '%' .$request->nama. '%')
                  ->orWhere('siswas.nama_lengkap','like', '%' .$request->nama. '%')
                  ->get();
        return view('searchStudentPayment', compact('siswas'));

    }
}
