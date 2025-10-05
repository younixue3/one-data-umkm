<?php

namespace App\Dtos\Pelatihan;

class StorePelatihanDTO
{
    public string $judul;
    public int $tahun;
    public string $kategori;
    public ?int $kelurahan_id;
    public ?int $kecamatan_id;
    public ?int $kabupaten_id; 
    public ?int $provinsi_id;

    public function __construct(array $validated)
    {
        $this->judul = $validated['judul'];
        $this->tahun = $validated['tahun'];
        $this->kategori = $validated['kategori'];
        $this->peserta = $validated['peserta'];
        $this->kelurahan_id = $validated['kelurahan_id'] ?? null;
        $this->kecamatan_id = $validated['kecamatan_id'] ?? null;
        $this->kabupaten_id = $validated['kabupaten_id'] ?? null;
        $this->provinsi_id = $validated['provinsi_id'] ?? null;
    }
}
