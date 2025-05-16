<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelatihan extends Model
{
    protected $table = 'pelatihan';

    protected $fillable = [
        'judul',
        'tahun',
        'kategori',
        'peserta',
        'kelurahan_id',
        'kecamatan_id', 
        'kabupaten_id',
        'provinsi_id'
    ];

    protected $casts = [
        'tahun' => 'integer',
        'kategori' => 'string'
    ];

    public const KATEGORI = [
        'aspek produksi',
        'aspek sdm',
        'aspek kelembagaan', 
        'aspek pemasaran',
        'aspek keuangan'
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan() 
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
