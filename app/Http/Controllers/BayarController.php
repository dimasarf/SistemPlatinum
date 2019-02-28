<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\pembayaran;


class BayarController extends Controller
{
    public function index($id)
    {
        $siswa = siswa::where('id_siswa', $id)->first();
        $cicilan = pembayaran::where('id_siswa', $id)->count();
        $nominal = pembayaran::where('id_siswa', $id)->sum('nominal');
        return view('bayar', compact('siswa','cicilan','nominal'));
    }
    public function bayar($id, Request $request)
    {
        $pembayaran = new pembayaran();
        $pembayaran->id_siswa = $id ;
        $pembayaran->kuitansi = $request->kuitansi ;
        $pembayaran->nominal = $request->nominal ;
        $pembayaran->tanggal = $request->tanggal ;
        $pembayaran->keterangan = $request->keterangan ;
        $pembayaran->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return back();
    }
}
