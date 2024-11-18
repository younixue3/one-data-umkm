<?php

namespace App\Repositories;

use App\Dtos\Bigindustri\StoreBigindustriDTO;
use App\Dtos\Bigindustri\UpdateBigindustriDTO;
use App\Models\Bigindustri;
use Illuminate\Support\Collection;

class BigindustriRepositories
{
    public function __construct(Bigindustri $bigindustri)
    {
        $this->bigindustri = $bigindustri;
    }

    public function index(): Collection
    {
        return $this->bigindustri->all();
    }

    public function show(int $id): ?Bigindustri
    {
        return $this->bigindustri->find($id);
    }

    public function store(StoreBigindustriDTO $dto): Bigindustri
    {
        return $this->bigindustri->create([
            'nama_perusahaan' => $dto->nama_perusahaan,
            'alamat_pabrik' => $dto->alamat_pabrik,
            'sektor_industri' => $dto->sektor_industri,
        ]);
    }

    public function update(int $id, UpdateBigindustriDTO $dto): Bigindustri
    {
        $updateData = [
            'nama_perusahaan' => $dto->nama_perusahaan,
            'alamat_pabrik' => $dto->alamat_pabrik,
            'sektor_industri' => $dto->sektor_industri,
        ];

        $this->bigindustri->find($id)->update($updateData);
        return $this->bigindustri->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->bigindustri->destroy($id);
    }
}
