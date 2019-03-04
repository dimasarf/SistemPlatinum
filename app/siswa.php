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

    
}
