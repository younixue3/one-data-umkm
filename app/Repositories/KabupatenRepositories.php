<?php

namespace App\Repositories;

use App\Dtos\Kabupaten\StoreKabupatenDTO;
use App\Dtos\Kabupaten\UpdateKabupatenDTO;
use App\Models\Kabupaten;
use Illuminate\Support\Collection;

class KabupatenRepositories
{
    public function __construct(Kabupaten $kabupaten)
    {
        $this->kabupaten = $kabupaten;
    }

    public function index(): Collection
    {
        return $this->kabupaten->all();
    }

    public function show(int $id): ?Kabupaten
    {
        return $this->kabupaten->find($id);
    }

    public function store(StoreKabupatenDTO $dto): Kabupaten
    {
        return $this->kabupaten->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateKabupatenDTO $dto): Kabupaten
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

        $this->kabupaten->find($id)->update($updateData);
        return $this->kabupaten->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->kabupaten->destroy($id);
    }
}
