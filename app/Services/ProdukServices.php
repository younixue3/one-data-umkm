<?php

namespace App\Services;

use App\Dtos\Produk\StoreProdukDTO;
use App\Dtos\Produk\UpdateProdukDTO;
use App\Exceptions\StandardizedException;
use App\Models\Produk;
use App\Repositories\ProdukRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProdukServices
{
    public function __construct(ProdukRepositories $produkRepositories)
    {
        $this->produkRepositories = $produkRepositories;
    }

    public function index(): Collection
    {
        return $this->produkRepositories->index();
    }

    public function show(int $id): ?Produk
    {
        $promo = $this->produkRepositories->show($id);
        if (!$promo instanceof Produk) {
            throw new StandardizedException('Produk tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreProdukDTO $dto): Produk
    {
        Log::info('Store Produk', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->produkRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateProdukDTO $dto): Produk
    {
        Log::info('Update Produk', [
            'DTO' => $dto,
        ]);

        return $this->produkRepositories->update($id,$dto);
    }

    public function destroy(Produk $produk): void
    {
        Log::info('Destory Produk', [
            $produk->toArray()
        ]);

        $this->produkRepositories->destroy($produk->id);
    }
}
