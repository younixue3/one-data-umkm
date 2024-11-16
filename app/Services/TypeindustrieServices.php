<?php

namespace App\Services;

use App\Dtos\Typeindustrie\StoreTypeindustrieDTO;
use App\Dtos\Typeindustrie\UpdateTypeindustrieDTO;
use App\Exceptions\StandardizedException;
use App\Models\Typeindustrie;
use App\Repositories\TypeindustrieRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeindustrieServices
{
    public function __construct(TypeindustrieRepositories $typeindustrieRepositories)
    {
        $this->typeindustrieRepositories = $typeindustrieRepositories;
    }

    public function index(): Collection
    {
        return $this->typeindustrieRepositories->index();
    }

    public function show(int $id): ?Typeindustrie
    {
        $promo = $this->typeindustrieRepositories->show($id);
        if (!$promo instanceof Typeindustrie) {
            throw new StandardizedException('Typeindustrie tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreTypeindustrieDTO $dto): Typeindustrie
    {
        Log::info('Store Typeindustrie', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->typeindustrieRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateTypeindustrieDTO $dto): Typeindustrie
    {
        Log::info('Update Typeindustrie', [
            'DTO' => $dto,
        ]);

        return $this->typeindustrieRepositories->update($id,$dto);
    }

    public function destroy(Typeindustrie $typeindustrie): void
    {
        Log::info('Destory Typeindustrie', [
            $typeindustrie->toArray()
        ]);

        $this->typeindustrieRepositories->destroy($typeindustrie->id);
    }
}
