<?php

namespace App\Services;

use App\Dtos\Provinsi\StoreProvinsiDTO;
use App\Dtos\Provinsi\UpdateProvinsiDTO;
use App\Exceptions\StandardizedException;
use App\Models\Provinsi;
use App\Repositories\ProvinsiRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProvinsiServices
{
    public function __construct(ProvinsiRepositories $provinsiRepositories)
    {
        $this->provinsiRepositories = $provinsiRepositories;
    }

    public function index(): Collection
    {
        return $this->provinsiRepositories->index();
    }

    public function show(int $id): ?Provinsi
    {
        $promo = $this->provinsiRepositories->show($id);
        if (!$promo instanceof Provinsi) {
            throw new StandardizedException('Provinsi tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreProvinsiDTO $dto): Provinsi
    {
        Log::info('Store Provinsi', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->provinsiRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateProvinsiDTO $dto): Provinsi
    {
        Log::info('Update Provinsi', [
            'DTO' => $dto,
        ]);

        return $this->provinsiRepositories->update($id,$dto);
    }

    public function destroy(Provinsi $provinsi): void
    {
        Log::info('Destory Provinsi', [
            $provinsi->toArray()
        ]);

        $this->provinsiRepositories->destroy($provinsi->id);
    }
}
