<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'tahun_izin' => 'integer',
        'tahun_data' => 'integer',
        'tenaga_kerja_pria' => 'integer',
        'tenaga_kerja_wanita' => 'integer',
        'nilai_investasi' => 'decimal:2',
        'nilai_kapasitas' => 'decimal:2',
        'nilai_produksi' => 'decimal:2',
        'nilai_bahan_baku' => 'decimal:2',
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

    public function jenis_usaha(): BelongsToMany
    {
        return $this->belongsToMany(Typeindustrie::class, 'ikm_typeindustrie');
    }

    public function jenis_produk(): BelongsToMany
    {
        return $this->belongsToMany(Typeproduct::class, 'ikm_typeproduct');
    }
}
