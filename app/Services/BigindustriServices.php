<?php

namespace App\Services;

use App\Dtos\Bigindustri\StoreBigindustriDTO;
use App\Dtos\Bigindustri\UpdateBigindustriDTO;
use App\Exceptions\StandardizedException;
use App\Models\Bigindustri;
use App\Repositories\BigindustriRepositories;
use App\Imports\BigindustrieImport;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class BigindustriServices
{
    public function __construct(BigindustriRepositories $bigindustriRepositories)
    {
        $this->bigindustriRepositories = $bigindustriRepositories;
    }

    public function index(): Collection
    {
        return $this->bigindustriRepositories->index();
    }

    public function show(int $id): ?Bigindustri
    {
        $bigindustri = $this->bigindustriRepositories->show($id);
        if (!$bigindustri instanceof Bigindustri) {
            throw new StandardizedException('Bigindustri tidak ditemukan.');
        }

        return $bigindustri;
    }

    public function store(StoreBigindustriDTO $dto): Bigindustri
    {
        Log::info('Store Bigindustri', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->bigindustriRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateBigindustriDTO $dto): Bigindustri
    {
        Log::info('Update Bigindustri', [
            'DTO' => $dto,
        ]);

        return $this->bigindustriRepositories->update($id, $dto);
    }

    public function destroy(Bigindustri $bigindustri): void
    {
        Log::info('Destroy Bigindustri', [
            $bigindustri->toArray()
        ]);

        $this->bigindustriRepositories->destroy($bigindustri->id);
    }

    public function import($file): void
    {
        try {
            DB::beginTransaction();
            
            Excel::import(new BigindustrieImport, $file);
            
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }
}
