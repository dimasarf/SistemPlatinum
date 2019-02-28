<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\siswa;

class MuridBaruController extends Controller
{
    public function indexSMP()
    {
        $jenjang = 'SMP';
        $rencanas = array('SMA/MA', 'SMK/MK');
        return view('inputMurid', compact('jenjang', 'rencanas'));
    }

    public function indexSMA()
    {
        $jenjang = 'SMA';
        $rencanas = array('SBMPTN', 'SNMPTN', 'STAN / KEDINASAN', 'AKPOL / AKMIL / AAL','SPAN-PTKIN');
        return view('inputMurid', compact('jenjang', 'rencanas'));
    }

    public function indexSMK()
    {
        $jenjang = 'SMK';
        $rencanas = array('SNMPTN / PMDK-PN', 'SBMPTN / UMPN', 'STAN / KEDINASAN', 'BINTARA POLISI');
        return view('inputMurid', compact('jenjang', 'rencanas'));
    }

    public function store(Request $request)
    {
        $siswa = new siswa();
        $siswa->id_siswa =  $request->id;
        $siswa->nama_lengkap = $request->nama_lengkap ;
        $siswa->nama_panggilan = $request->nama_panggilan ;
        $siswa->tempat_lahir = $request->tempat_lahir ;
        $siswa->tgl_lahir = $request->tgl ;
        $siswa->jenis_kelamin = $request->jenis_kelamin ;
        $siswa->alamat = $request->alamat ;
        $siswa->agama = $request->agama ;
        $siswa->id_line = $request->id_line ;
        $siswa->email = $request->email ;
        $siswa->nama_ayah = $request->nama_ayah ;
        $siswa->nama_ibu = $request->nama_ibu ;
        $siswa->pekerjaan_ayah = $request->pekerjaan_ayah ;
        $siswa->pekerjaan_ibu = $request->pekerjaan_ibu ;
        $siswa->telepon_rumah = $request->telepon_rumah ;
        $siswa->telepon_siswa = $request->telp_siswa ;
        $siswa->telepon_ortu = $request->telepon_ortu ;
        $siswa->asal_sekolah = $request->asal_sekolah ;
        $siswa->jam = $request->jam ;
        $siswa->rencana_lulus = $request->rencana ;
        $siswa->jadwal = $request->hari ;
        $siswa->diskon = $request->diskon ;
        $siswa->metode_pembayaran = $request->metode ;
        $siswa->jenis_pembayaran = $request->jenis ;
        $siswa->jenjang = $request->jenjang ;
        $siswa->kuitansi = $request->kuitansi;
        $siswa->jurusan = $request->jurusan;
        $siswa->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return back();
        
    }
}
