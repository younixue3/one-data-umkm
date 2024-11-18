<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $kelurahans = [
            // Bunyu
            ['id' => 3660091001, 'kecamatan_id' => 366009, 'name' => 'Bunyu Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660091002, 'kecamatan_id' => 366009, 'name' => 'Bunyu Selatan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660091003, 'kecamatan_id' => 366009, 'name' => 'Bunyu Timur', 'created_at' => now(), 'updated_at' => now()],

            // Peso
            ['id' => 3660081001, 'kecamatan_id' => 366008, 'name' => 'Lepak Aru', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081002, 'kecamatan_id' => 366008, 'name' => 'Long Bia', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081003, 'kecamatan_id' => 366008, 'name' => 'Long Buang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081004, 'kecamatan_id' => 366008, 'name' => 'Long Lasan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081005, 'kecamatan_id' => 366008, 'name' => 'Long Lejuh', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081006, 'kecamatan_id' => 366008, 'name' => 'Long Lian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081007, 'kecamatan_id' => 366008, 'name' => 'Long Peleban', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081008, 'kecamatan_id' => 366008, 'name' => 'Long Peso', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081009, 'kecamatan_id' => 366008, 'name' => 'Long Yi\'in', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660081010, 'kecamatan_id' => 366008, 'name' => 'Muara Pengean', 'created_at' => now(), 'updated_at' => now()],

            // Peso Hilir
            ['id' => 3660101001, 'kecamatan_id' => 366010, 'name' => 'Long Bang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660101002, 'kecamatan_id' => 366010, 'name' => 'Long Bang Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660101003, 'kecamatan_id' => 366010, 'name' => 'Long Lembu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660101004, 'kecamatan_id' => 366010, 'name' => 'Long Telenjau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660101005, 'kecamatan_id' => 366010, 'name' => 'Long Tunggu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660101006, 'kecamatan_id' => 366010, 'name' => 'Naha Aya', 'created_at' => now(), 'updated_at' => now()],

            // Sekatak
            ['id' => 3660071001, 'kecamatan_id' => 366007, 'name' => 'Ambalat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071002, 'kecamatan_id' => 366007, 'name' => 'Anjar Arip', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071003, 'kecamatan_id' => 366007, 'name' => 'Bambang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071004, 'kecamatan_id' => 366007, 'name' => 'Bekiliu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071005, 'kecamatan_id' => 366007, 'name' => 'Bunau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071006, 'kecamatan_id' => 366007, 'name' => 'Kelembunan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071007, 'kecamatan_id' => 366007, 'name' => 'Kelincauan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071008, 'kecamatan_id' => 366007, 'name' => 'Kelising', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071009, 'kecamatan_id' => 366007, 'name' => 'Kendari', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071010, 'kecamatan_id' => 366007, 'name' => 'Keriting', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071011, 'kecamatan_id' => 366007, 'name' => 'Liagu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071012, 'kecamatan_id' => 366007, 'name' => 'Maritam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071013, 'kecamatan_id' => 366007, 'name' => 'Paru Abang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071014, 'kecamatan_id' => 366007, 'name' => 'Pentian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071015, 'kecamatan_id' => 366007, 'name' => 'Punan Dulau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071016, 'kecamatan_id' => 366007, 'name' => 'Pungit', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071017, 'kecamatan_id' => 366007, 'name' => 'Sekatak Bengara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071018, 'kecamatan_id' => 366007, 'name' => 'Sekatak Buji', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071019, 'kecamatan_id' => 366007, 'name' => 'Tenggiling', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071020, 'kecamatan_id' => 366007, 'name' => 'Terindak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071021, 'kecamatan_id' => 366007, 'name' => 'Turung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660071022, 'kecamatan_id' => 366007, 'name' => 'Ujang', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Palas
            ['id' => 3660021001, 'kecamatan_id' => 366002, 'name' => 'Antutan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021002, 'kecamatan_id' => 366002, 'name' => 'Gunung Putih', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021003, 'kecamatan_id' => 366002, 'name' => 'Pejalin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021004, 'kecamatan_id' => 366002, 'name' => 'Teras Baru', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021005, 'kecamatan_id' => 366002, 'name' => 'Teras Nawang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021006, 'kecamatan_id' => 366002, 'name' => 'Karang Anyar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021007, 'kecamatan_id' => 366002, 'name' => 'Tanjung Palas Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021008, 'kecamatan_id' => 366002, 'name' => 'Tanjung Palas Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660021009, 'kecamatan_id' => 366002, 'name' => 'Tanjung Palas Tengah', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Palas Barat
            ['id' => 3660031001, 'kecamatan_id' => 366003, 'name' => 'Long Beluah', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660031002, 'kecamatan_id' => 366003, 'name' => 'Long Sam', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660031003, 'kecamatan_id' => 366003, 'name' => 'Long Pari', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660031004, 'kecamatan_id' => 366003, 'name' => 'Mara Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660031005, 'kecamatan_id' => 366003, 'name' => 'Mara Satu', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Palas Tengah
            ['id' => 3660041001, 'kecamatan_id' => 366004, 'name' => 'Salimbatu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660041002, 'kecamatan_id' => 366004, 'name' => 'Silva Rahayu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660041003, 'kecamatan_id' => 366004, 'name' => 'Tanjung Buka', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Palas Timur
            ['id' => 3660051001, 'kecamatan_id' => 366005, 'name' => 'Binai', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051002, 'kecamatan_id' => 366005, 'name' => 'Mangkupadi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051003, 'kecamatan_id' => 366005, 'name' => 'Pura Sajau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051004, 'kecamatan_id' => 366005, 'name' => 'Sajau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051005, 'kecamatan_id' => 366005, 'name' => 'Sajau Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051006, 'kecamatan_id' => 366005, 'name' => 'Tanah Kuning', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051007, 'kecamatan_id' => 366005, 'name' => 'Tanjung Agung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660051008, 'kecamatan_id' => 366005, 'name' => 'Wonomulyo', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Palas Utara
            ['id' => 3660061001, 'kecamatan_id' => 366006, 'name' => 'Ardi Mulyo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660061002, 'kecamatan_id' => 366006, 'name' => 'Karang Agung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660061003, 'kecamatan_id' => 366006, 'name' => 'Kelubir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660061004, 'kecamatan_id' => 366006, 'name' => 'Panca Agung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660061005, 'kecamatan_id' => 366006, 'name' => 'Pimping', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660061006, 'kecamatan_id' => 366006, 'name' => 'Ruhui Rahayu', 'created_at' => now(), 'updated_at' => now()],

            // Tanjung Selor
            ['id' => 3660011001, 'kecamatan_id' => 366001, 'name' => 'Apung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011002, 'kecamatan_id' => 366001, 'name' => 'Bumi Rahayu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011003, 'kecamatan_id' => 366001, 'name' => 'Gunung Sari', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011004, 'kecamatan_id' => 366001, 'name' => 'Gunung Seriang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011005, 'kecamatan_id' => 366001, 'name' => 'Jelarai Selor', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011006, 'kecamatan_id' => 366001, 'name' => 'Tengkapak', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011007, 'kecamatan_id' => 366001, 'name' => 'Tanjung Selor Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011008, 'kecamatan_id' => 366001, 'name' => 'Tanjung Selor Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3660011009, 'kecamatan_id' => 366001, 'name' => 'Tanjung Selor Timur', 'created_at' => now(), 'updated_at' => now()],

            // Bahau Hulu
            ['id' => 3670031001, 'kecamatan_id' => 367003, 'name' => 'Apau Ping', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670031002, 'kecamatan_id' => 367003, 'name' => 'Long Alango', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670031003, 'kecamatan_id' => 367003, 'name' => 'Long Berini', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670031004, 'kecamatan_id' => 367003, 'name' => 'Long Kemuat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670031005, 'kecamatan_id' => 367003, 'name' => 'Long Tebulo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670031006, 'kecamatan_id' => 367003, 'name' => 'Long Uli', 'created_at' => now(), 'updated_at' => now()],

            // Kayan Hilir
            ['id' => 3670041001, 'kecamatan_id' => 367004, 'name' => 'Data Dian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670041002, 'kecamatan_id' => 367004, 'name' => 'Long Pipa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670041003, 'kecamatan_id' => 367004, 'name' => 'Long Sule', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670041004, 'kecamatan_id' => 367004, 'name' => 'Long Metun', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670041005, 'kecamatan_id' => 367004, 'name' => 'Sungai Anai', 'created_at' => now(), 'updated_at' => now()],

            // Kayan Hulu
            ['id' => 3670051001, 'kecamatan_id' => 367005, 'name' => 'Long Betaoh', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670051002, 'kecamatan_id' => 367005, 'name' => 'Long Nawang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670051003, 'kecamatan_id' => 367005, 'name' => 'Long Payau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670051004, 'kecamatan_id' => 367005, 'name' => 'Long Temuyat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670051005, 'kecamatan_id' => 367005, 'name' => 'Nawang Baru', 'created_at' => now(), 'updated_at' => now()],

            // Kayan Selatan
            ['id' => 3670061001, 'kecamatan_id' => 367006, 'name' => 'Lidung Payau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670061002, 'kecamatan_id' => 367006, 'name' => 'Long Ampung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670061003, 'kecamatan_id' => 367006, 'name' => 'Long Sungai Barang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670061004, 'kecamatan_id' => 367006, 'name' => 'Long Uro', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670061005, 'kecamatan_id' => 367006, 'name' => 'Metulang', 'created_at' => now(), 'updated_at' => now()],

            // Malinau Barat
            ['id' => 3670071001, 'kecamatan_id' => 367007, 'name' => 'Kuala Lapang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071002, 'kecamatan_id' => 367007, 'name' => 'Long Bila', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071003, 'kecamatan_id' => 367007, 'name' => 'Long Kenipe', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071004, 'kecamatan_id' => 367007, 'name' => 'Punan Bengalun', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071005, 'kecamatan_id' => 367007, 'name' => 'Sempayang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071006, 'kecamatan_id' => 367007, 'name' => 'Sentaban', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071007, 'kecamatan_id' => 367007, 'name' => 'Sesua', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071008, 'kecamatan_id' => 367007, 'name' => 'Tanjung Lapang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670071009, 'kecamatan_id' => 367007, 'name' => 'Taras', 'created_at' => now(), 'updated_at' => now()],

            // Malinau Kota
            ['id' => 3670011001, 'kecamatan_id' => 367001, 'name' => 'Batu Lidung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670011002, 'kecamatan_id' => 367001, 'name' => 'Malinau Hilir', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670011003, 'kecamatan_id' => 367001, 'name' => 'Malinau Hulu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670011004, 'kecamatan_id' => 367001, 'name' => 'Malinau Kota', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670011005, 'kecamatan_id' => 367001, 'name' => 'Pelita Kanaan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670011006, 'kecamatan_id' => 367001, 'name' => 'Tanjung Keranjang', 'created_at' => now(), 'updated_at' => now()],

            // Malinau Selatan
            ['id' => 3670081001, 'kecamatan_id' => 367008, 'name' => 'Bila Bekayuk', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081002, 'kecamatan_id' => 367008, 'name' => 'Laban Nyarit', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081003, 'kecamatan_id' => 367008, 'name' => 'Langap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081004, 'kecamatan_id' => 367008, 'name' => 'Long Loreh', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081005, 'kecamatan_id' => 367008, 'name' => 'Nunuk Tanah Kibang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081006, 'kecamatan_id' => 367008, 'name' => 'Paya Saturan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081007, 'kecamatan_id' => 367008, 'name' => 'Pelencau', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081008, 'kecamatan_id' => 367008, 'name' => 'Punan Rian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670081009, 'kecamatan_id' => 367008, 'name' => 'Sengayan', 'created_at' => now(), 'updated_at' => now()],

            // Malinau Selatan Hilir
            ['id' => 3670091001, 'kecamatan_id' => 367009, 'name' => 'Batu Kajang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091002, 'kecamatan_id' => 367009, 'name' => 'Gong Solok', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091003, 'kecamatan_id' => 367009, 'name' => 'Long Adiu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091004, 'kecamatan_id' => 367009, 'name' => 'Punan Gong Solok', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091005, 'kecamatan_id' => 367009, 'name' => 'Punan Long Adiu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091006, 'kecamatan_id' => 367009, 'name' => 'Punan Setarap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091007, 'kecamatan_id' => 367009, 'name' => 'Setarap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670091008, 'kecamatan_id' => 367009, 'name' => 'Setulang', 'created_at' => now(), 'updated_at' => now()],

            // Malinau Selatan Hulu
            // Kabupaten Malinau - Malinau Utara
            ['id' => 3670021001, 'kecamatan_id' => 367002, 'name' => 'Belayan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021002, 'kecamatan_id' => 367002, 'name' => 'Kelapis', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021003, 'kecamatan_id' => 367002, 'name' => 'Kaliamok', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021004, 'kecamatan_id' => 367002, 'name' => 'Lubak Manis', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021005, 'kecamatan_id' => 367002, 'name' => 'Luso', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021006, 'kecamatan_id' => 367002, 'name' => 'Malinau Seberang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021007, 'kecamatan_id' => 367002, 'name' => 'Putat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021008, 'kecamatan_id' => 367002, 'name' => 'Respen Tubu', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021009, 'kecamatan_id' => 367002, 'name' => 'Salap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021010, 'kecamatan_id' => 367002, 'name' => 'Sembuak Warod', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021011, 'kecamatan_id' => 367002, 'name' => 'Semengaris', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3670021012, 'kecamatan_id' => 367002, 'name' => 'Seruyung', 'created_at' => now(), 'updated_at' => now()],

            // Kabupaten Nunukan - Nunukan
            ['id' => 3680011001, 'kecamatan_id' => 368001, 'name' => 'Nunukan Barat', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680011002, 'kecamatan_id' => 368001, 'name' => 'Nunukan Timur', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680011003, 'kecamatan_id' => 368001, 'name' => 'Nunukan Utara', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680011004, 'kecamatan_id' => 368001, 'name' => 'Nunukan Tengah', 'created_at' => now(), 'updated_at' => now()],

            // Kabupaten Nunukan - Sebatik
            ['id' => 3680031001, 'kecamatan_id' => 368003, 'name' => 'Tanjung Karang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680031002, 'kecamatan_id' => 368003, 'name' => 'Sungai Nyamuk', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680031003, 'kecamatan_id' => 368003, 'name' => 'Pancang', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3680031004, 'kecamatan_id' => 368003, 'name' => 'Balansiku', 'created_at' => now(), 'updated_at' => now()],

            // Kabupaten Tana Tidung - Sesayap
            ['id' => 3690011001, 'kecamatan_id' => 369001, 'name' => 'Tideng Pale', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3690011002, 'kecamatan_id' => 369001, 'name' => 'Sesayap', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3690011003, 'kecamatan_id' => 369001, 'name' => 'Sengkong', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3690011004, 'kecamatan_id' => 369001, 'name' => 'Sebawang', 'created_at' => now(), 'updated_at' => now()],

            // Kota Tarakan - Tarakan Barat
            ['id' => 3700011001, 'kecamatan_id' => 370001, 'name' => 'Karang Anyar', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700011002, 'kecamatan_id' => 370001, 'name' => 'Karang Balik', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700011003, 'kecamatan_id' => 370001, 'name' => 'Karang Rejo', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700011004, 'kecamatan_id' => 370001, 'name' => 'Karang Harapan', 'created_at' => now(), 'updated_at' => now()],

            // Kota Tarakan - Tarakan Timur  
            ['id' => 3700021001, 'kecamatan_id' => 370002, 'name' => 'Lingkas Ujung', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700021002, 'kecamatan_id' => 370002, 'name' => 'Gunung Lingkas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700021003, 'kecamatan_id' => 370002, 'name' => 'Mamburungan', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3700021004, 'kecamatan_id' => 370002, 'name' => 'Pantai Amal', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('kelurahans')->insert($kelurahans);
    }
} 