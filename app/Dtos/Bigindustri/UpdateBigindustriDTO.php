<?php

namespace App\Dtos\Bigindustri;

class UpdateBigindustriDTO
{
    public readonly string $nama_perusahaan;
    public readonly string $alamat_pabrik;
    public readonly string $sektor_industri;

    public function __construct(array $validated)
    {
        $this->nama_perusahaan = $validated['nama_perusahaan'];
        $this->alamat_pabrik = $validated['alamat_pabrik'];
        $this->sektor_industri = $validated['sektor_industri'];
    }
}
