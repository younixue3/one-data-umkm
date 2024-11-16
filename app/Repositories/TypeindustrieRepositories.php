<?php

namespace App\Repositories;

use App\Dtos\Typeindustrie\StoreTypeindustrieDTO;
use App\Dtos\Typeindustrie\UpdateTypeindustrieDTO;
use App\Models\Typeindustrie;
use Illuminate\Support\Collection;

class TypeindustrieRepositories
{
    public function __construct(Typeindustrie $typeindustrie)
    {
        $this->typeindustrie = $typeindustrie;
    }

    public function index(): Collection
    {
        return $this->typeindustrie->all();
    }

    public function show(int $id): ?Typeindustrie
    {
        return $this->typeindustrie->find($id);
    }

    public function store(StoreTypeindustrieDTO $dto): Typeindustrie
    {
        return $this->typeindustrie->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateTypeindustrieDTO $dto): Typeindustrie
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

        $this->typeindustrie->find($id)->update($updateData);
        return $this->typeindustrie->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->typeindustrie->destroy($id);
    }
}
