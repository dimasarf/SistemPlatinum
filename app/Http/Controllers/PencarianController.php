<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PencarianController extends Controller
{
    public function index(Request $request)
    {
        $search_key = $request->keyword;
        $jadwals = DB::table('jadwals')
                  ->join('mapels', 'jadwals.idMapel', '=', 'mapels.id')
                  ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                  ->where('tentors.tentor', 'like', '%' .$request->keyword. '%')
                  ->join('kelas', 'jadwals.idKelas','=' ,'kelas.id')
                  ->orWhere('kelas.kelas', 'like', '%' .$request->keyword. '%')
                  ->select('jadwals.*', 'tentors.tentor', 'mapels.mapel', 'kelas.kelas')
                  ->orderBy('jadwals.tanggal', 'DESC')
                  ->get();
        
        // return $jadwals;
        return view('pencarian', compact('jadwals'));
    }
}
