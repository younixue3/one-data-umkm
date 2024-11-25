<?php

namespace App\Services;

use App\Dtos\Kegiatan\StoreKegiatanDTO;
use App\Dtos\Kegiatan\UpdateKegiatanDTO;
use App\Exceptions\StandardizedException;
use App\Models\Kegiatan;
use App\Repositories\KegiatanRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KegiatanServices
{
    public function __construct(KegiatanRepositories $kegiatanRepositories)
    {
        $this->kegiatanRepositories = $kegiatanRepositories;
    }

    public function index(): Collection
    {
        return $this->kegiatanRepositories->index();
    }

    public function show(int $id): ?Kegiatan
    {
        $promo = $this->kegiatanRepositories->show($id);
        if (!$promo instanceof Kegiatan) {
            throw new StandardizedException('Kegiatan tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreKegiatanDTO $dto): Kegiatan
    {
        Log::info('Store Kegiatan', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->kegiatanRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateKegiatanDTO $dto): Kegiatan
    {
        Log::info('Update Kegiatan', [
            'DTO' => $dto,
        ]);

        return $this->kegiatanRepositories->update($id,$dto);
    }

    public function destroy(Kegiatan $kegiatan): void
    {
        Log::info('Destory Kegiatan', [
            $kegiatan->toArray()
        ]);

        $this->kegiatanRepositories->destroy($kegiatan->id);
    }
}
