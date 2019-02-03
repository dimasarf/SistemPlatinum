<?php

namespace App\Http\Controllers;
use App\jadwal;
use App\kelas;
use App\mapel;
use App\tentor;

use Illuminate\Http\Request;

class InputScheduluController extends Controller
{
    public function displayForm(Request $request)
    {
        $jumlah = $request->jmlKelas;
        $tanggal = $request->tanggal;
        $kelas = kelas::all();
        $tentors = tentor::all();
        $mapels = mapel::all();        
        return view('InputSchedule', compact('jumlah', 'kelas', 'mapels','tentors', 'tanggal'));
    }

    public function storeJadwal(Request $request)
    {   
        $id = (jadwal::orderBy('id','desc')->first()->id) + 1;
        $jadwal = new jadwal();
        $jadwal->id = $id;
        $jadwal->idMapel = $request->mapel;
        $jadwal->jam = $request->jam;
        $jadwal->idTentor = $request->tentor;
        $jadwal->idKelas = $request->kelas;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->save();
        return response()->json($id);
    }
}
