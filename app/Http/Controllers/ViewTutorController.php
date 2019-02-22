<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tentor;
use App\jadwal;
use App\kelas;
use App\mapel;
use DB;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ViewTutorController extends Controller
{
    public function index()
    {
        $tentors = tentor::paginate(5);
        // $tentors = tentor::all();
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

    public function getJadwalWeekly($id, $date)
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $tanggal = new Carbon($date);
        $tanggal2 = new Carbon($date);
        $startweek = $tanggal->startOfWeek();
        $endweek = $tanggal2->endOfWeek();
        
        $jadwals = DB::table('jadwals')
                   ->where('jadwals.idTentor', $id)
                   ->where('jadwals.tanggal','>=', $startweek )
                   ->where('jadwals.tanggal','<=', $endweek )
                   ->join('mapels','jadwals.idMapel','=','mapels.id')
                   ->join('kelas','jadwals.idKelas','=', 'kelas.id')
                   ->select('jadwals.*', 'kelas.kelas', 'mapels.mapel')
                   ->get();
        return response()->json($jadwals);
    }

    public function delete($id)
    {
        tentor::destroy($id);
        return back();
    }

    public function getTutors()
    {
        $tentors = tentor::paginate(5);
        return response()->json($tentors);
    }
}
