<?php

namespace App\Services;

use App\Dtos\Profil\StoreProfilDTO;
use App\Dtos\Profil\UpdateProfilDTO;
use App\Exceptions\StandardizedException;
use App\Models\Profil;
use App\Repositories\ProfilRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfilServices
{
    private const VALID_CATEGORIES = ['visi_misi', 'profil', 'tugas_pokok_fungsi'];

    public function __construct(ProfilRepositories $profilRepositories)
    {
        $this->profilRepositories = $profilRepositories;
    }

    public function index($category): Collection
    {
        return $this->profilRepositories->index($category);
    }

    public function showByCategory(string $category): ?Profil
    {
        return $this->profilRepositories->showByCategory($category);
    }

    public function show(int $id): ?Profil
    {
        $profil = $this->profilRepositories->show($id);
        if (!$profil instanceof Profil) {
            throw new StandardizedException('Profil tidak ditemukan.');
        }

        return $profil;
    }

    public function store(StoreProfilDTO $dto): Profil
    {
        Log::info('Store Profil', [
            'DTO' => $dto,
        ]);

        if (!in_array($dto->category, self::VALID_CATEGORIES)) {
            throw new StandardizedException('Kategori tidak valid.');
        }

        try {
            DB::beginTransaction();
            $data = $this->profilRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateProfilDTO $dto): Profil
    {
        Log::info('Update Profil', [
            'DTO' => $dto,
        ]);

        if (!in_array($dto->category, self::VALID_CATEGORIES)) {
            throw new StandardizedException('Kategori tidak valid.');
        }

        try {
            DB::beginTransaction();
            $data = $this->profilRepositories->update($id, $dto);
            DB::commit();
            return $data;
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }

    public function destroy(Profil $profil): void
    {
        Log::info('Destroy Profil', [
            $profil->toArray()
        ]);

        try {
            DB::beginTransaction();
            $this->profilRepositories->destroy($profil->id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }
}
