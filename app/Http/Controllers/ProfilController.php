<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;
use App\Harga;
use App\pembayaran;

class ProfilController extends Controller
{
    public function index($id)
    {
        $profil = siswa::where('id_siswa',$id)->first();

        $diskon = Harga::getDiskon($profil->diskon);
        $diskon_display = number_format($diskon,2,',','.');

        $hargaJenjang = Harga::getHarga($profil->jenjang, $profil->jenis_bayar);
        $harga_display = number_format($hargaJenjang,2,',','.');

        $_harga = $hargaJenjang - $diskon;
        $hargaTotal =number_format($_harga,2,',','.');
        
        $nominal_siswa = pembayaran::where('id_siswa',$id )->sum('nominal');
        $nominal = number_format($nominal_siswa,2,',','.');
        
        $angsuran = pembayaran::where('id_siswa',$id )->count();
        // return $profil->jurusan;
        return view('profilSiswa', compact('profil','hargaTotal', 'nominal','angsuran', 'diskon_display','harga_display'));
    }
}
