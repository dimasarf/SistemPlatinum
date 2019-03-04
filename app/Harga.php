<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Harga extends Model
{
    public static function getDiskon($kategori)
    {
        if($kategori == 'Event')
            return $potongan = 500000;
        else if($kategori == 'alumni')
            return $potongan = 100000;
        else if($kategori == 'Event')
            return $potongan = 200000;
        else if($kategori == 'Referensi')
            return $potongan = 150000;
        else 
            return $potongan = 0;
    }

    public static function getHarga($jenjang, $jenis)
    {
        if($jenjang == 'SMK')
            return $harga = 4500000;
        else
            if($jenis == 'Lunas')
                return $harga = 4650000;
            else
                return $harga = 5500000;
    }
}
