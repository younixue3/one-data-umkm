<?php

namespace App\Repositories;

use App\Dtos\Bidang\StoreBidangDTO;
use App\Dtos\Bidang\UpdateBidangDTO;
use App\Models\Bidang;
use Illuminate\Support\Collection;

class BidangRepositories
{
    public function __construct(Bidang $bidang)
    {
        $this->bidang = $bidang;
    }

    public function index(): Collection
    {
        return $this->bidang->all();
    }

    public function show(int $id): ?Bidang
    {
        return $this->bidang->find($id);
    }

    public function store(StoreBidangDTO $dto): Bidang
    {
        return $this->bidang->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateBidangDTO $dto): Bidang
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

        $this->bidang->find($id)->update($updateData);
        return $this->bidang->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->bidang->destroy($id);
    }
}
