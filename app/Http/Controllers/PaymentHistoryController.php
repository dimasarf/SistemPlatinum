<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\pembayaran;
use DB;

class PaymentHistoryController extends Controller
{
    public function index()
    {
        $pembayaran = DB::table('pembayarans')
                      ->join('siswas', 'pembayarans.id_siswa',  '=', 'siswas.id_siswa')
                      ->select(DB::raw('(siswas.id_siswa) as id_siswa'), DB::raw('(siswas.nama_lengkap) as nama_lengkap'), DB::raw('(siswas.asal_sekolah) as asal_sekolah'),DB::raw('count(*) as jumlahBayar'), DB::raw('sum(nominal) as nominal'))
                      ->groupBy('id_siswa', 'nama_lengkap', 'asal_sekolah')
                      ->get();
        return view('paymentHistory', compact('pembayaran'));
    }

    public function cari(Request $request)
    {
        $pembayaran = DB::table('pembayarans')
                      ->where('pembayarans.id_siswa','like', '%' .$request->nama. '%')
                      ->join('siswas', 'pembayarans.id_siswa',  '=', 'siswas.id_siswa')
                      ->orWhere('siswas.nama_lengkap','like', '%' .$request->nama. '%')
                      ->select(DB::raw('(siswas.id_siswa) as id_siswa'), DB::raw('(siswas.nama_lengkap) as nama_lengkap'), DB::raw('(siswas.asal_sekolah) as asal_sekolah'),DB::raw('count(*) as jumlahBayar'), DB::raw('sum(nominal) as nominal'))
                      ->groupBy('id_siswa', 'nama_lengkap', 'asal_sekolah')
                      ->get();
        if(count($pembayaran) == 0)
        {
            $pembayaran = DB::table('siswas')
                          ->where('siswas.nama_lengkap','like', '%' .$request->nama. '%')
                          ->orWhere('siswas.id_siswa','like', '%' .$request->nama. '%')
                          ->get();
        }
        return view('paymentHistory', compact('pembayaran'));

    }
}
