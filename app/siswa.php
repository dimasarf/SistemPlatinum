<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class siswa extends Model
{
    public static function getRencanaJenjang($jenjang)
    {
        $hasil = DB::table('siswas')
                ->where('jenjang', $jenjang)
                ->select(DB::raw('(siswas.rencana_lulus) as rencana'), DB::raw('count(*) as jumlah'))
                ->groupBy('rencana')
                ->get();
        return $hasil;
    }

    public static function getRencanaJenjangTahun($jenjang, $tahun)
    {
        $hasil = DB::table('siswas')
                ->where('jenjang', $jenjang)
                ->where('siswas.id_siswa', 'like', '%' .$tahun. '%')
                ->select(DB::raw('(siswas.rencana_lulus) as rencana'), DB::raw('count(*) as jumlah'))
                ->groupBy('rencana')
                ->get();
        return $hasil;
    }

    public static function getTotalSiswa($jenjang, $tahun)
    {
        $jumlahSiswa = DB::table('siswas')
                    ->where('jenjang',$jenjang)
                    ->where('siswas.id_siswa', 'like', '%' .$tahun. '%')
                    ->count();
        return  $jumlahSiswa;
    }

    
}
