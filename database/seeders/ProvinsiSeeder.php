<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        DB::table('provinsis')->insert([
            [
                'id' => 24,
                'name' => 'KALIMANTAN UTARA',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
} 