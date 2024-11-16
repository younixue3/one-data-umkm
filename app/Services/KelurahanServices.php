<?php

namespace App\Services;

use App\Dtos\Kelurahan\StoreKelurahanDTO;
use App\Dtos\Kelurahan\UpdateKelurahanDTO;
use App\Exceptions\StandardizedException;
use App\Models\Kelurahan;
use App\Repositories\KelurahanRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KelurahanServices
{
    public function __construct(KelurahanRepositories $kelurahanRepositories)
    {
        $this->kelurahanRepositories = $kelurahanRepositories;
    }

    public function index(): Collection
    {
        return $this->kelurahanRepositories->index();
    }

    public function show(int $id): ?Kelurahan
    {
        $promo = $this->kelurahanRepositories->show($id);
        if (!$promo instanceof Kelurahan) {
            throw new StandardizedException('Kelurahan tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreKelurahanDTO $dto): Kelurahan
    {
        Log::info('Store Kelurahan', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->kelurahanRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateKelurahanDTO $dto): Kelurahan
    {
        Log::info('Update Kelurahan', [
            'DTO' => $dto,
        ]);

        return $this->kelurahanRepositories->update($id,$dto);
    }

    public function destroy(Kelurahan $kelurahan): void
    {
        Log::info('Destory Kelurahan', [
            $kelurahan->toArray()
        ]);

        $this->kelurahanRepositories->destroy($kelurahan->id);
    }
}
