<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    public function run()
    {
        $kabupatens = [
            [
                'id' => 366,
                'provinsi_id' => 24,
                'name' => 'KABUPATEN BULUNGAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 367,
                'provinsi_id' => 24,
                'name' => 'KABUPATEN MALINAU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 368,
                'provinsi_id' => 24,
                'name' => 'KABUPATEN NUNUKAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 369,
                'provinsi_id' => 24,
                'name' => 'KABUPATEN TANA TIDUNG',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 370,
                'provinsi_id' => 24,
                'name' => 'KOTA TARAKAN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('kabupatens')->insert($kabupatens);
    }
} 