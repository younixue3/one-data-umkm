<?php

namespace App\Repositories;

use App\Dtos\Produk\StoreProdukDTO;
use App\Dtos\Produk\UpdateProdukDTO;
use App\Models\Produk;
use Illuminate\Support\Collection;

class ProdukRepositories
{
    public function __construct(Produk $produk)
    {
        $this->produk = $produk;
    }

    public function index(): Collection
    {
        return $this->produk->all();
    }

    public function show(int $id): ?Produk
    {
        return $this->produk->find($id);
    }

    public function store(StoreProdukDTO $dto): Produk
    {
        return $this->produk->create([
//            'name' => $dto->name,
//            'price' => $dto->price,
//            'description' => $dto->description,
//            'start_date' => $dto->start_date,
//            'end_date' => $dto->end_date,
//            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateProdukDTO $dto): Produk
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

        $this->produk->find($id)->update($updateData);
        return $this->produk->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->produk->destroy($id);
    }
}
