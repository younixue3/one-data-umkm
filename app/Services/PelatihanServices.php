<?php

namespace App\Services;

use App\Dtos\Pelatihan\StorePelatihanDTO;
use App\Dtos\Pelatihan\UpdatePelatihanDTO;
use App\Exceptions\StandardizedException;
use App\Models\Pelatihan;
use App\Repositories\PelatihanRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PelatihanServices
{
    private const VALID_CATEGORIES = ['online', 'offline'];

    public function __construct(PelatihanRepositories $pelatihanRepositories)
    {
        $this->pelatihanRepositories = $pelatihanRepositories;
    }

    public function index(): Collection
    {
        return $this->pelatihanRepositories->index();
    }

    public function showByCategory(string $category): ?Pelatihan
    {
        return $this->pelatihanRepositories->showByCategory($category);
    }

    public function show(int $id): ?Pelatihan
    {
        $pelatihan = $this->pelatihanRepositories->show($id);
        if (!$pelatihan instanceof Pelatihan) {
            throw new StandardizedException('Pelatihan tidak ditemukan.');
        }

        return $pelatihan;
    }

    public function store(StorePelatihanDTO $dto): Pelatihan
    {
        Log::info('Store Pelatihan', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->pelatihanRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdatePelatihanDTO $dto): Pelatihan
    {
        Log::info('Update Pelatihan', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->pelatihanRepositories->update($id, $dto);
            DB::commit();
            return $data;
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }

    public function destroy(Pelatihan $pelatihan): void
    {
        Log::info('Destroy Pelatihan', [
            $pelatihan->toArray()
        ]);

        try {
            DB::beginTransaction();
            $this->pelatihanRepositories->destroy($pelatihan->id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }
}
