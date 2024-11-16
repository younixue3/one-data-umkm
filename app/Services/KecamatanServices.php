<?php

namespace App\Services;

use App\Dtos\Kecamatan\StoreKecamatanDTO;
use App\Dtos\Kecamatan\UpdateKecamatanDTO;
use App\Exceptions\StandardizedException;
use App\Models\Kecamatan;
use App\Repositories\KecamatanRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KecamatanServices
{
    public function __construct(KecamatanRepositories $kecamatanRepositories)
    {
        $this->kecamatanRepositories = $kecamatanRepositories;
    }

    public function index(): Collection
    {
        return $this->kecamatanRepositories->index();
    }

    public function show(int $id): ?Kecamatan
    {
        $promo = $this->kecamatanRepositories->show($id);
        if (!$promo instanceof Kecamatan) {
            throw new StandardizedException('Kecamatan tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreKecamatanDTO $dto): Kecamatan
    {
        Log::info('Store Kecamatan', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->kecamatanRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateKecamatanDTO $dto): Kecamatan
    {
        Log::info('Update Kecamatan', [
            'DTO' => $dto,
        ]);

        return $this->kecamatanRepositories->update($id,$dto);
    }

    public function destroy(Kecamatan $kecamatan): void
    {
        Log::info('Destory Kecamatan', [
            $kecamatan->toArray()
        ]);

        $this->kecamatanRepositories->destroy($kecamatan->id);
    }
}
