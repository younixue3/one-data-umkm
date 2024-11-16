<?php

namespace App\Repositories;

use App\Dtos\Typeproduct\StoreTypeproductDTO;
use App\Dtos\Typeproduct\UpdateTypeproductDTO;
use App\Models\Typeproduct;
use Illuminate\Support\Collection;

class TypeproductRepositories
{
    public function __construct(Typeproduct $typeproduct)
    {
        $this->typeproduct = $typeproduct;
    }

    public function index(): Collection
    {
        return $this->typeproduct->all();
    }

    public function show(int $id): ?Typeproduct
    {
        return $this->typeproduct->find($id);
    }

    public function store(StoreTypeproductDTO $dto): Typeproduct
    {
        return $this->typeproduct->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateTypeproductDTO $dto): Typeproduct
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

        $this->typeproduct->find($id)->update($updateData);
        return $this->typeproduct->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->typeproduct->destroy($id);
    }
}
