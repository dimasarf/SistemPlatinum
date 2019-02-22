<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jadwal;
use App\kelas;
use App\mapel;
use App\tentor;

class EditScheduleController extends Controller
{
    public function index($id)
    {
        $kelas = kelas::all();
        $tentors = tentor::all();
        $mapels = mapel::all();

        $jadwal = jadwal::find($id);
        return view('editJadwal', compact('kelas', 'tentors', 'mapels', 'jadwal'));
    }

    public function save($id, Request $request)
    {
        $jadwal = jadwal::find($id);
        $jadwal->jam = $request->jam;
        $jadwal->idKelas = $request->kelas;
        $jadwal->idMapel = $request->pelajaran;
        $jadwal->idTentor = $request->tentor;
        $jadwal->save();
        $request->session()->flash('status', 'Data Berhasil Disimpan!');
        return redirect()->back();
    }
}
