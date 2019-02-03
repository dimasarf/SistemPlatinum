<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tentor;
use App\jadwal;
use App\kelas;
use App\mapel;
use DB;

class ViewTutorController extends Controller
{
    public function index()
    {
        $tentors = tentor::paginate(5);
        return view('viewTutor', compact('tentors'));
    }

    public function getJadwal($id)
    {
        $jadwals = DB::table('jadwals')
                   ->where('jadwals.idTentor', $id)
                   ->join('mapels','jadwals.idMapel','=','mapels.id')
                   ->join('kelas','jadwals.idKelas','=', 'kelas.id')
                   ->select('jadwals.*', 'kelas.kelas', 'mapels.mapel')
                   ->get();
        return response()->json($jadwals);
    }
}
