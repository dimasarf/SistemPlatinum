<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\jadwal;
use App\tentor;
use App\kelas;
use App\mapel;
use DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {
        $jadwals = jadwal::count();
        $tutors = tentor::count();
        $kelas = kelas::count();
        $mapels = mapel::count();
        
        $tanggal = Carbon::today()->format('Y-m-d');
        $jadwal_Today = DB::table('jadwals')
                        ->where('jadwals.tanggal','=',  $tanggal)
                        ->join('mapels','jadwals.idMapel','=','mapels.id')
                        ->join('kelas','jadwals.idKelas','=', 'kelas.id')
                        ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                        ->select('jadwals.*', 'kelas.kelas', 'mapels.mapel', 'tentors.tentor')
                        ->get();
        return view('index', compact('jadwals','tutors', 'mapels', 'kelas', 'jadwal_Today'));
    }

    public function getJadwalByDate($tanggal)
    {
        $jadwals = DB::table('jadwals')
                   ->where('tanggal', $tanggal)
                   ->join('mapels', 'jadwals.idMapel', '=', 'mapels.id')
                   ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                   ->join('kelas', 'jadwals.idKelas', '=', 'kelas.id')
                   ->select('jadwals.*', 'tentors.tentor', 'mapels.mapel', 'kelas.kelas')
                   ->get();
        return response()->json($jadwals);
    }
}
