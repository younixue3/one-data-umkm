<?php

namespace App\Repositories;

use App\Dtos\Kecamatan\StoreKecamatanDTO;
use App\Dtos\Kecamatan\UpdateKecamatanDTO;
use App\Models\Kecamatan;
use Illuminate\Support\Collection;

class KecamatanRepositories
{
    public function __construct(Kecamatan $kecamatan)
    {
        $this->kecamatan = $kecamatan;
    }

    public function index(): Collection
    {
        return $this->kecamatan->all();
    }

    public function show(int $id): ?Kecamatan
    {
        return $this->kecamatan->find($id);
    }

    public function store(StoreKecamatanDTO $dto): Kecamatan
    {
        return $this->kecamatan->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateKecamatanDTO $dto): Kecamatan
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

        $this->kecamatan->find($id)->update($updateData);
        return $this->kecamatan->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->kecamatan->destroy($id);
    }
}
