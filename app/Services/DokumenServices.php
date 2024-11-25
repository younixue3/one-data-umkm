<?php

namespace App\Services;

use App\Dtos\Dokumen\StoreDokumenDTO;
use App\Dtos\Dokumen\UpdateDokumenDTO;
use App\Exceptions\StandardizedException;
use App\Models\Dokumen;
use App\Repositories\DokumenRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DokumenServices
{
    public function __construct(DokumenRepositories $dokumenRepositories)
    {
        $this->dokumenRepositories = $dokumenRepositories;
    }

    public function index(): Collection
    {
        return $this->dokumenRepositories->index();
    }

    public function show(int $id): ?Dokumen
    {
        $promo = $this->dokumenRepositories->show($id);
        if (!$promo instanceof Dokumen) {
            throw new StandardizedException('Dokumen tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreDokumenDTO $dto): Dokumen
    {
        Log::info('Store Dokumen', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->dokumenRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateDokumenDTO $dto): Dokumen
    {
        Log::info('Update Dokumen', [
            'DTO' => $dto,
        ]);

        return $this->dokumenRepositories->update($id,$dto);
    }

    public function destroy(Dokumen $dokumen): void
    {
        Log::info('Destory Dokumen', [
            $dokumen->toArray()
        ]);

        $this->dokumenRepositories->destroy($dokumen->id);
    }
}
