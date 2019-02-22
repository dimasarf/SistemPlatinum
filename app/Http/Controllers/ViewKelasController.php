<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tentor;
use App\jadwal;
use App\kelas;
use App\mapel;
use DB;

class ViewKelasController extends Controller
{
    public function index()
    {
        $kelas = kelas::paginate(5);
        return view('viewKelas',compact('kelas'));
    }

    public function getJadwalKelas($id)
    {
        $jadwals = DB::table('jadwals')
                   ->where('jadwals.idKelas',$id)
                   ->join('mapels', 'jadwals.idMapel','=','mapels.id')
                   ->join('tentors','jadwals.idTentor','=', 'tentors.id')
                   ->join('kelas', 'jadwals.idKelas','=','kelas.id')
                   ->select('jadwals.*','tentors.tentor','kelas.kelas','mapels.mapel')
                   ->get();
        return response()->json($jadwals);
    }

    public function delete($id)
    {
        kelas::destroy($id);
        return back();
    }
}
