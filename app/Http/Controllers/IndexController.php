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
use Carbon\CarbonTimeZone;
use App\siswa;
use Response;

class IndexController extends Controller
{
    public function index()
    {
        $jadwals = jadwal::count();
        $tutors = tentor::count();
        $kelas = kelas::count();
        $mapels = mapel::count();
        $jumlahSMP = DB::table('siswas')->where('jenjang','SMP')->count();
        $jumlahSMA = DB::table('siswas')->where('jenjang','SMA')->count();
        $jumlahSMK = DB::table('siswas')->where('jenjang','SMK')->count();
        $timestamp = '2014-02-06 16:34:00';
        $jumlahSiswa = siswa::count();
        $rencanaSMK = siswa::getRencanaJenjang('SMK');
        $rencanaSMA = json_decode(siswa::getRencanaJenjang('SMA'));
        $rencanaSMP = siswa::getRencanaJenjang('SMP');
        
        $tanggal = Carbon::today()->format('Y-m-d');
        $jadwal_Today = DB::table('jadwals')
                        ->where('jadwals.tanggal','=',  $tanggal)
                        ->join('mapels','jadwals.idMapel','=','mapels.id')
                        ->join('kelas','jadwals.idKelas','=', 'kelas.id')
                        ->join('tentors', 'jadwals.idTentor', '=', 'tentors.id')
                        ->select('jadwals.*', 'kelas.kelas', 'mapels.mapel', 'tentors.tentor')
                        ->get();
        // return $rencanaSMK;
        return view('index', compact('jadwals','tutors', 'mapels', 'kelas', 'jadwal_Today','jumlahSMP','jumlahSMA','jumlahSMK','jumlahSiswa','rencanaSMK','rencanaSMA','rencanaSMP'));
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

    public function getJenjangTahun($tahun)
    {
        $rencanaSMA = siswa::getRencanaJenjangTahun('SMA', $tahun);
        $rencanaSMK = siswa::getRencanaJenjangTahun('SMK', $tahun);
        $rencanaSMP = siswa::getRencanaJenjangTahun('SMP', $tahun);
        $jumlahSMP = siswa::getTotalSiswa('SMP', '2019');
        $jumlahSMA = siswa::getTotalSiswa('SMA', '2019');
        $jumlahSMK =siswa::getTotalSiswa('SMK', '2019');
        return Response::json(array
        (
            'rencanaSMA' => $rencanaSMA,
            'rencanaSMK' => $rencanaSMK,
            'rencanaSMP' => $rencanaSMP,
            'jumlahSMP' => $jumlahSMP,
            'jumlahSMA' => $jumlahSMA,
            'jumlahSMK' => $jumlahSMK,
        ));
    }
}
