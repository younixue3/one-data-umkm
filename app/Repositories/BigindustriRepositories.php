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
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateBigindustriDTO $dto): Bigindustri
    {
        $updateData = [
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
        ];

//        if ($dto->image) {
//            $updateData['image'] = $dto->image;
//        }

        $this->bigindustri->find($id)->update($updateData);
        return $this->bigindustri->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->bigindustri->destroy($id);
    }
}
