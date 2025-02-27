<?php

namespace App\Services;

use App\Dtos\Bidang\StoreBidangDTO;
use App\Dtos\Bidang\UpdateBidangDTO;
use App\Exceptions\StandardizedException;
use App\Models\Bidang;
use App\Repositories\BidangRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BidangServices
{
    public function __construct(BidangRepositories $bidangRepositories)
    {
        $this->bidangRepositories = $bidangRepositories;
    }

    public function index($category): Collection
    {
        return $this->bidangRepositories->index($category);
    }

    public function show(int $id): ?Bidang
    {
        $promo = $this->bidangRepositories->show($id);
        if (!$promo instanceof Bidang) {
            throw new StandardizedException('Bidang tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreBidangDTO $dto): Bidang
    {
        Log::info('Store Bidang', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->bidangRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateBidangDTO $dto): Bidang
    {
        Log::info('Update Bidang', [
            'DTO' => $dto,
        ]);

        return $this->bidangRepositories->update($id,$dto);
    }

    public function destroy(Bidang $bidang): void
    {
        Log::info('Destory Bidang', [
            $bidang->toArray()
        ]);

        $this->bidangRepositories->destroy($bidang->id);
    }
}
