<?php

namespace App\Repositories;

use App\Dtos\Dokumen\StoreDokumenDTO;
use App\Dtos\Dokumen\UpdateDokumenDTO;
use App\Models\Dokumen;
use Illuminate\Support\Collection;

class DokumenRepositories
{
    public function __construct(Dokumen $dokumen)
    {
        $this->dokumen = $dokumen;
    }

    public function index(): Collection
    {
        return $this->dokumen->all();
    }

    public function show(int $id): ?Dokumen
    {
        return $this->dokumen->find($id);
    }

    public function store(StoreDokumenDTO $dto): Dokumen
    {
        return $this->dokumen->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateDokumenDTO $dto): Dokumen
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

        $this->dokumen->find($id)->update($updateData);
        return $this->dokumen->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->dokumen->destroy($id);
    }
}
