<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profils')->insert([
            [
                'category' => 'visi-misi',
                'description' => '<div><h3>Visi:</h3><p>Menjadi lembaga yang unggul dalam pelayanan masyarakat.</p><h3>Misi:</h3><ol><li>Meningkatkan kualitas pelayanan</li><li>Mengembangkan sistem yang efisien</li></ol></div>',
                'image' => 'assets/1.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'profil',
                'description' => '<div><p>Lembaga kami berdiri sejak tahun 2010 dengan fokus utama memberikan pelayanan terbaik kepada masyarakat dalam berbagai aspek pembangunan daerah.</p></div>',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'tugas-pokok-fungsi',
                'description' => '<div><h3>Tugas Pokok:</h3><p>Melaksanakan pembangunan dan pengembangan daerah.</p><h3>Fungsi:</h3><ol><li>Perencanaan program</li><li>Pelaksanaan kebijakan</li><li>Monitoring dan evaluasi</li></ol></div>',
                'image' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
