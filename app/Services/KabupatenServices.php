<?php

namespace App\Services;

use App\Dtos\Kabupaten\StoreKabupatenDTO;
use App\Dtos\Kabupaten\UpdateKabupatenDTO;
use App\Exceptions\StandardizedException;
use App\Models\Kabupaten;
use App\Repositories\KabupatenRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KabupatenServices
{
    public function __construct(KabupatenRepositories $kabupatenRepositories)
    {
        $this->kabupatenRepositories = $kabupatenRepositories;
    }

    public function index(): Collection
    {
        return $this->kabupatenRepositories->index();
    }

    public function show(int $id): ?Kabupaten
    {
        $promo = $this->kabupatenRepositories->show($id);
        if (!$promo instanceof Kabupaten) {
            throw new StandardizedException('Kabupaten tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreKabupatenDTO $dto): Kabupaten
    {
        Log::info('Store Kabupaten', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->kabupatenRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateKabupatenDTO $dto): Kabupaten
    {
        Log::info('Update Kabupaten', [
            'DTO' => $dto,
        ]);

        return $this->kabupatenRepositories->update($id,$dto);
    }

    public function destroy(Kabupaten $kabupaten): void
    {
        Log::info('Destory Kabupaten', [
            $kabupaten->toArray()
        ]);

        $this->kabupatenRepositories->destroy($kabupaten->id);
    }
}
