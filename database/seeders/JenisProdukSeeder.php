<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typeproduct;

class JenisProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jenisProduk = [
            ['name' => 'Makanan'],
            ['name' => 'Minuman'],
            ['name' => 'Kerajinan'],
            ['name' => 'Tekstil'],
            ['name' => 'Furniture'],
            ['name' => 'Elektronik'],
            ['name' => 'Kosmetik'],
            ['name' => 'Herbal'],
            ['name' => 'Aksesoris'],
            ['name' => 'Lainnya'],
        ];

        foreach ($jenisProduk as $jenis) {
            Typeproduct::create($jenis);
        }
    }
}
