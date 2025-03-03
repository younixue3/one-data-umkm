<?php

namespace App\Services;

use App\Dtos\Ikm\StoreIkmDTO;
use App\Dtos\Ikm\UpdateIkmDTO;
use App\Exceptions\StandardizedException;
use App\Models\Ikm;
use App\Repositories\IkmRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Imports\IkmImport;
use Maatwebsite\Excel\Facades\Excel;

class IkmServices
{
    private IkmRepositories $ikmRepositories;

    public function __construct(IkmRepositories $ikmRepositories)
    {
        $this->ikmRepositories = $ikmRepositories;
    }

    public function index(): Collection
    {
        return $this->ikmRepositories->index();
    }

    public function show(int $id): ?Ikm
    {
        $ikm = $this->ikmRepositories->show($id);
        if (!$ikm instanceof Ikm) {
            throw new StandardizedException('Ikm tidak ditemukan.');
        }

        return $ikm;
    }

    public function store(StoreIkmDTO $dto): Ikm
    {
        Log::info('Store Ikm', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->ikmRepositories->store($dto);
            DB::commit();
            return $data;
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }

    public function update(int $id, UpdateIkmDTO $dto): Ikm
    {
        Log::info('Update Ikm', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->ikmRepositories->update($id, $dto);
            DB::commit();
            return $data;
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }

    public function destroy(int $id): void
    {
        $ikm = $this->show($id);
        
        Log::info('Destroy Ikm', [
            'ikm' => $ikm->toArray()
        ]);

        try {
            DB::beginTransaction();
            $this->ikmRepositories->destroy($id);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }

    public function import($file): void
    {
        try {
            DB::beginTransaction();
            
            Excel::import(new IkmImport, $file);
            
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }
}
