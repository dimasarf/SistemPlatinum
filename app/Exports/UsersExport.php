<?php

namespace App\Exports;

use App\jadwal;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use App\tentor;
use App\kelas;
use App\mapel;
use DB;
use Carbon\Carbon;

class UsersExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    public function __construct($id, $tanggal)
    {
        $this->id = $id;
        $this->tanggall = $tanggal;
    }

    public function query()
    {
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $tanggal = new Carbon($this->tanggall);
        $tanggal2 = new Carbon($this->tanggall);
        $startweek = $tanggal->startOfWeek();
        $endweek = $tanggal2->endOfWeek();
        
        $jadwals = DB::table('jadwals')
                   ->where('jadwals.idTentor', $this->id)
                   ->where('jadwals.tanggal','>=', $startweek )
                   ->where('jadwals.tanggal','<=', $endweek )
                   ->join('mapels','jadwals.idMapel','=','mapels.id')
                   ->join('kelas','jadwals.idKelas','=', 'kelas.id')
                   ->select('jadwals.*', 'kelas.kelas', 'mapels.mapel')
                   ->get();
        return $jadwals;
        // return jadwal::all();
    }
}
