<?php

namespace App\Repositories;

use App\Dtos\Provinsi\StoreProvinsiDTO;
use App\Dtos\Provinsi\UpdateProvinsiDTO;
use App\Models\Provinsi;
use Illuminate\Support\Collection;

class ProvinsiRepositories
{
    public function __construct(Provinsi $provinsi)
    {
        $this->provinsi = $provinsi;
    }

    public function index(): Collection
    {
        return $this->provinsi->all();
    }

    public function show(int $id): ?Provinsi
    {
        return $this->provinsi->find($id);
    }

    public function store(StoreProvinsiDTO $dto): Provinsi
    {
        return $this->provinsi->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateProvinsiDTO $dto): Provinsi
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

        $this->provinsi->find($id)->update($updateData);
        return $this->provinsi->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->provinsi->destroy($id);
    }
}
