<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tentor;
use App\jadwal;
use App\kelas;
use App\mapel;
use DB;

class ViewMapelController extends Controller
{
    public function index()
    {
        $mapels = mapel::paginate(5);
        return view('viewMapel',compact('mapels'));
    }

    public function getJadwalMapel($id)
    {
        $jadwals = DB::table('jadwals')
                   ->where('jadwals.idMapel',$id)
                   ->join('mapels', 'jadwals.idMapel','=','mapels.id')
                   ->join('tentors','jadwals.idTentor','=', 'tentors.id')
                   ->join('kelas', 'jadwals.idKelas','=','kelas.id')
                   ->select('jadwals.*','tentors.tentor','kelas.kelas')
                   ->get();
        return response()->json($jadwals);
    }
}
