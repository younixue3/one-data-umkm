<?php

namespace App\Repositories;

use App\Dtos\Kelurahan\StoreKelurahanDTO;
use App\Dtos\Kelurahan\UpdateKelurahanDTO;
use App\Models\Kelurahan;
use Illuminate\Support\Collection;

class KelurahanRepositories
{
    public function __construct(Kelurahan $kelurahan)
    {
        $this->kelurahan = $kelurahan;
    }

    public function index(): Collection
    {
        return $this->kelurahan->all();
    }

    public function show(int $id): ?Kelurahan
    {
        return $this->kelurahan->find($id);
    }

    public function store(StoreKelurahanDTO $dto): Kelurahan
    {
        return $this->kelurahan->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateKelurahanDTO $dto): Kelurahan
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

        $this->kelurahan->find($id)->update($updateData);
        return $this->kelurahan->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->kelurahan->destroy($id);
    }
}
