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

    public function index($category = null): Collection
    {
        return $this->bidang->where('category', $category)->get();
    }

    public function show(int $id): ?Bidang
    {
        return $this->bidang->find($id);
    }

    public function store(StoreBidangDTO $dto): Bidang
    {
        return $this->bidang->create([
            'title' => $dto->title,
            'description' => $dto->description,
            'category' => $dto->category,
            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateBidangDTO $dto): Bidang
    {
        $updateData = [
            'title' => $dto->title,
            'description' => $dto->description,
            'category' => $dto->category,
        ];

        if ($dto->image) {
            $updateData['image'] = $dto->image;
        }

        $this->bidang->find($id)->update($updateData);
        return $this->bidang->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->bidang->destroy($id);
    }
}
