<?php

namespace App\Repositories;

use App\Dtos\Kegiatan\StoreKegiatanDTO;
use App\Dtos\Kegiatan\UpdateKegiatanDTO;
use App\Models\Kegiatan;
use Illuminate\Support\Collection;

class KegiatanRepositories
{
    public function __construct(Kegiatan $kegiatan)
    {
        $this->kegiatan = $kegiatan;
    }

    public function index(): Collection
    {
        return $this->kegiatan->all();
    }

    public function show(int $id): ?Kegiatan
    {
        return $this->kegiatan->find($id);
    }

    public function store(StoreKegiatanDTO $dto): Kegiatan
    {
        return $this->kegiatan->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateKegiatanDTO $dto): Kegiatan
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

        $this->kegiatan->find($id)->update($updateData);
        return $this->kegiatan->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->kegiatan->destroy($id);
    }
}
