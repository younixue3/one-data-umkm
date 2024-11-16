<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ikms', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('kelurahan_id')->nullable();
            $table->string('kabupaten_id')->nullable();
            $table->string('kecamatan_id')->nullable();
            $table->string('provinsi_id')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kontak_person')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_izin')->nullable();
            $table->string('tahun_izin')->nullable();
            $table->string('jenis_usaha_id')->nullable();
            $table->string('jenis_produk_id')->nullable();
            $table->string('tahun_data')->nullable();
            $table->string('tenaga_kerja_pria')->nullable();
            $table->string('tenaga_kerja_wanita')->nullable();
            $table->string('nilai_investasi')->nullable();
            $table->string('nilai_kapasitas')->nullable();
            $table->string('satuan_kapasitas')->nullable();
            $table->string('nilai_produksi')->nullable();
            $table->string('nilai_bahan_baku')->nullable();
            $table->string('status_ekspor')->nullable();
            $table->string('negara_tujuan_ekspor')->nullable();
            $table->string('status_aktif')->nullable();
            $table->string('jenis_pembiayaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikms');
    }
};
