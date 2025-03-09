<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typeindustrie;

class JenisUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisUsaha = [
            ['name' => 'Mikro'],
            ['name' => 'Kecil'],
            ['name' => 'Menengah'],
            ['name' => 'Besar'],
        ];

        foreach ($jenisUsaha as $jenis) {
            Typeindustrie::create($jenis);
        }
    }
}
