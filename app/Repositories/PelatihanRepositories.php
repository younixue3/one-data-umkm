<?php

namespace App\Repositories;

use App\Dtos\Pelatihan\StorePelatihanDTO;
use App\Dtos\Pelatihan\UpdatePelatihanDTO;
use App\Models\Pelatihan;
use Illuminate\Support\Collection;

class PelatihanRepositories
{
    public function __construct(Pelatihan $pelatihan)
    {
        $this->pelatihan = $pelatihan;
    }

    public function index(): Collection
    {
        return $this->pelatihan->all();
    }

    public function showByCategory(string $kategori): ?Pelatihan
    {
        return $this->pelatihan->where('kategori', $kategori)->get()->first();
    }

    public function show(int $id): ?Pelatihan
    {
        return $this->pelatihan->find($id);
    }

    public function store(StorePelatihanDTO $dto): Pelatihan
    {
        return $this->pelatihan->create([
            'judul' => $dto->judul,
            'tahun' => $dto->tahun,
            'kategori' => $dto->kategori,
            'peserta' => $dto->peserta,
            'kelurahan_id' => $dto->kelurahan_id,
            'kecamatan_id' => $dto->kecamatan_id,
            'kabupaten_id' => $dto->kabupaten_id,
            'provinsi_id' => $dto->provinsi_id
        ]);
    }

    public function update(int $id, UpdatePelatihanDTO $dto): Pelatihan
    {
        $pelatihan = $this->pelatihan->findOrFail($id);
        
        $updateData = [
            'judul' => $dto->judul,
            'tahun' => $dto->tahun,
            'kategori' => $dto->kategori,
            'peserta' => $dto->peserta,
            'kelurahan_id' => $dto->kelurahan_id,
            'kecamatan_id' => $dto->kecamatan_id,
            'kabupaten_id' => $dto->kabupaten_id,
            'provinsi_id' => $dto->provinsi_id
        ];

        $pelatihan->update($updateData);
        return $pelatihan;
    }

    public function destroy(int $id): bool
    {
        $pelatihan = $this->pelatihan->findOrFail($id);
        return $pelatihan->delete();
    }
}
