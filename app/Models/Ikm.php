<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ikm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'nama_pemilik',
        'alamat',
        'kelurahan_id',
        'kecamatan_id', 
        'kabupaten_id',
        'provinsi_id',
        'kontak_person',
        'no_hp',
        'email',
        'nomor_izin',
        'tahun_izin',
        'jenis_usaha_id',
        'jenis_produk_id',
        'tahun_data',
        'tenaga_kerja_pria',
        'tenaga_kerja_wanita',
        'nilai_investasi',
        'nilai_kapasitas',
        'satuan_kapasitas',
        'nilai_produksi',
        'nilai_bahan_baku',
        'status_ekspor',
        'negara_tujuan_ekspor',
        'status_aktif',
        'jenis_pembiayaan'
    ];

    protected $casts = [
        'tahun_izin' => 'string',
        'tahun_data' => 'string',
        'tenaga_kerja_pria' => 'string',
        'tenaga_kerja_wanita' => 'string',
        'nilai_investasi' => 'string',
        'nilai_kapasitas' => 'string',
        'nilai_produksi' => 'string',
        'nilai_bahan_baku' => 'string',
        'status_ekspor' => 'string',
        'status_aktif' => 'string'
    ];

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabupaten(): BelongsTo
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function jenis_usaha(): BelongsTo
    {
        return $this->belongsTo(Typeindustrie::class, 'jenis_usaha_id');
    }

    public function jenis_produk(): BelongsTo
    {
        return $this->belongsTo(Typeproduct::class, 'jenis_produk_id');
    }
}
