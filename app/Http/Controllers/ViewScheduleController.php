<?php

namespace App\Http\Controllers;
use App\jadwal;
use App\kelas;
use App\mapel;
use App\tentor;
use DB;

use Illuminate\Http\Request;


class ViewScheduleController extends Controller
{
    public function index()
    {
        $kelas = kelas::all();
        $tentors = tentor::all();
        $mapels = mapel::all();  
        return view('viewSchedule', compact('kelas','tentors','mapels'));
    }

    public function cariJadwal(Request $request)
    {
        $jadwals = DB::table('jadwals')
                  ->where('tanggal', $request->tanggal)
                  ->join('mapels', 'jadwals.idMapel', '=', 'mapels.id')
                  ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                  ->join('kelas', 'jadwals.idKelas', '=', 'kelas.id')
                  ->select('jadwals.*', 'tentors.tentor', 'mapels.mapel', 'kelas.kelas')
                  ->get();
        $n = 1;
        $kelas = kelas::all();
        $tentors = tentor::all();
        $mapels = mapel::all();
        return view('viewSchedule', compact('jadwals','n','kelas','tentors','mapels'));
    }

    public function delete($id)
    {
        return jadwal::destroy($id);
    }

    public function getJadwal($tanggal)
    {
        $jadwals = DB::table('jadwals')
                  ->where('tanggal', $tanggal)
                  ->join('mapels', 'jadwals.idMapel', '=', 'mapels.id')
                  ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                  ->join('kelas', 'jadwals.idKelas', '=', 'kelas.id')
                  ->select('jadwals.*', 'tentors.tentor', 'mapels.mapel', 'kelas.kelas')
                  ->get();
        return $jadwals;
    }

    public function edit($id, Request $request)
    {
        $jadwal = jadwal::find($id);
        
    }
}
