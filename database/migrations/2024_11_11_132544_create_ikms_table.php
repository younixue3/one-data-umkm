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
            $table->text('alamat')->nullable();
            $table->foreignId('kelurahan_id')->nullable()->constrained('kelurahans')->onDelete('set null');
            $table->foreignId('kecamatan_id')->nullable()->constrained('kecamatans')->onDelete('set null');
            $table->foreignId('kabupaten_id')->nullable()->constrained('kabupatens')->onDelete('set null');
            $table->foreignId('provinsi_id')->nullable()->constrained('provinsis')->onDelete('set null');
            $table->string('kontak_person')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();
            $table->string('nomor_izin')->nullable();
            $table->year('tahun_izin')->nullable();
            $table->year('tahun_data')->nullable();
            $table->integer('tenaga_kerja_pria')->nullable();
            $table->integer('tenaga_kerja_wanita')->nullable();
            $table->decimal('nilai_investasi', 20, 2)->nullable();
            $table->decimal('nilai_kapasitas', 20, 2)->nullable();
            $table->string('satuan_kapasitas')->nullable();
            $table->decimal('nilai_produksi', 20, 2)->nullable();
            $table->decimal('nilai_bahan_baku', 20, 2)->nullable();
            $table->enum('status_ekspor', ['Ya', 'Tidak'])->nullable();
            $table->string('negara_tujuan_ekspor')->nullable();
            $table->enum('status_aktif', ['Aktif', 'Tidak Aktif'])->nullable();
            $table->enum('jenis_pembiayaan', ['Modal Sendiri', 'Pinjaman Bank', 'Lainnya'])->nullable();
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
