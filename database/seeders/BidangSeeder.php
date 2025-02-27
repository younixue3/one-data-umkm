<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bidang::insert([
            [
                'description' => '<h2>Bidang Perindustrian</h2><p>Bidang Perindustrian bertanggung jawab dalam pengembangan dan pembinaan sektor industri di wilayah Kalimantan Utara. Fokus utama meliputi:</p><ul><li>Pemberdayaan industri kecil menengah</li><li>Fasilitasi pengembangan teknologi industri</li><li>Peningkatan daya saing produk lokal</li></ul><p>Kami berkomitmen untuk mendukung pertumbuhan sektor industri yang berkelanjutan dan berdaya saing.</p>',
                'image' => 'bidang/perindustrian.jpg',
                'category' => 'perindustrian',
                'created_at' => now()
            ],
            [
                'description' => '<h2>Bidang Perdagangan</h2><p>Bidang Perdagangan mengelola dan mengawasi kegiatan perdagangan di Kalimantan Utara. Tugas utama kami mencakup:</p><ul><li>Pengaturan distribusi barang</li><li>Pemantauan harga pasar</li><li>Pembinaan pelaku usaha</li><li>Pengembangan ekspor daerah</li></ul><p>Kami berupaya menciptakan iklim perdagangan yang sehat dan menguntungkan bagi semua pihak.</p>',
                'image' => 'bidang/perdagangan.jpg',
                'category' => 'perdagangan dalam negeri',
                'created_at' => now()
            ],
            [
                'description' => '<h2>Bidang Koperasi dan UKM</h2><p>Bidang Koperasi dan UKM berperan dalam pemberdayaan dan pengembangan koperasi serta usaha kecil menengah. Program kami berfokus pada:</p><ul><li>Peningkatan kapasitas manajemen</li><li>Fasilitasi akses permodalan</li><li>Pembinaan dan pendampingan usaha</li><li>Pengembangan jaringan usaha dan kemitraan</li></ul><p>Kami berkomitmen untuk mendorong pertumbuhan ekonomi lokal melalui penguatan sektor koperasi dan UKM.</p>',
                'image' => 'bidang/koperasi.jpg',
                'category' => 'koperasi',
                'created_at' => now()
            ]
        ]);
    }
}
