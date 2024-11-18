<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $kecamatans = [
            ['id' => 366001, 'kabupaten_id' => 366, 'name' => 'Tanjung Selor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366002, 'kabupaten_id' => 366, 'name' => 'Tanjung Palas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366003, 'kabupaten_id' => 366, 'name' => 'Tanjung Palas Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366004, 'kabupaten_id' => 366, 'name' => 'Tanjung Palas Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366005, 'kabupaten_id' => 366, 'name' => 'Tanjung Palas Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366006, 'kabupaten_id' => 366, 'name' => 'Tanjung Palas Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366007, 'kabupaten_id' => 366, 'name' => 'Sekatak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366008, 'kabupaten_id' => 366, 'name' => 'Peso', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366009, 'kabupaten_id' => 366, 'name' => 'Bunyu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 366010, 'kabupaten_id' => 366, 'name' => 'Peso Hilir', 'created_at' => now(), 'updated_at' => now()],
            
            // Kabupaten Malinau
            ['id' => 367001, 'kabupaten_id' => 367, 'name' => 'Malinau Kota', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367002, 'kabupaten_id' => 367, 'name' => 'Malinau Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367003, 'kabupaten_id' => 367, 'name' => 'Malinau Selatan Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367004, 'kabupaten_id' => 367, 'name' => 'Malinau Selatan Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367005, 'kabupaten_id' => 367, 'name' => 'Malinau Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367006, 'kabupaten_id' => 367, 'name' => 'Mentarang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367007, 'kabupaten_id' => 367, 'name' => 'Mentarang Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367008, 'kabupaten_id' => 367, 'name' => 'Pujungan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367009, 'kabupaten_id' => 367, 'name' => 'Kayan Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367010, 'kabupaten_id' => 367, 'name' => 'Kayan Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367011, 'kabupaten_id' => 367, 'name' => 'Kayan Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367012, 'kabupaten_id' => 367, 'name' => 'Sungai Boh', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 367013, 'kabupaten_id' => 367, 'name' => 'Bahau Hulu', 'created_at' => now(), 'updated_at' => now()],

            // Kabupaten Nunukan
            ['id' => 368001, 'kabupaten_id' => 368, 'name' => 'Nunukan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368002, 'kabupaten_id' => 368, 'name' => 'Nunukan Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368003, 'kabupaten_id' => 368, 'name' => 'Sebatik', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368004, 'kabupaten_id' => 368, 'name' => 'Sebatik Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368005, 'kabupaten_id' => 368, 'name' => 'Sebatik Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368006, 'kabupaten_id' => 368, 'name' => 'Sebatik Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368007, 'kabupaten_id' => 368, 'name' => 'Sebatik Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368008, 'kabupaten_id' => 368, 'name' => 'Krayan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368009, 'kabupaten_id' => 368, 'name' => 'Krayan Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368010, 'kabupaten_id' => 368, 'name' => 'Lumbis', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368011, 'kabupaten_id' => 368, 'name' => 'Lumbis Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368012, 'kabupaten_id' => 368, 'name' => 'Lumbis Pansiangan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368013, 'kabupaten_id' => 368, 'name' => 'Sembakung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368014, 'kabupaten_id' => 368, 'name' => 'Sembakung Atulai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 368015, 'kabupaten_id' => 368, 'name' => 'Tulin Onsoi', 'created_at' => now(), 'updated_at' => now()],

            // Kabupaten Tana Tidung
            ['id' => 369001, 'kabupaten_id' => 369, 'name' => 'Sesayap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 369002, 'kabupaten_id' => 369, 'name' => 'Sesayap Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 369003, 'kabupaten_id' => 369, 'name' => 'Tana Lia', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 369004, 'kabupaten_id' => 369, 'name' => 'Betayau', 'created_at' => now(), 'updated_at' => now()],

            // Kota Tarakan
            ['id' => 370001, 'kabupaten_id' => 370, 'name' => 'Tarakan Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 370002, 'kabupaten_id' => 370, 'name' => 'Tarakan Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 370003, 'kabupaten_id' => 370, 'name' => 'Tarakan Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 370004, 'kabupaten_id' => 370, 'name' => 'Tarakan Utara', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('kecamatans')->insert($kecamatans);
    }
}