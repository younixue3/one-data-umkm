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

    public function show(int $id): Ikm
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
            
            $ikms = Excel::import(new IkmImport, $file);
            
            // Ensure relationships are properly set
            foreach ($ikms as $ikm) {
                // Set kelurahan relationship
                if ($ikm->kelurahan_id) {
                    $ikm->kelurahan()->associate(Kelurahan::where('name', $ikm->kelurahan_id)->first());
                }
                
                // Set kecamatan relationship 
                if ($ikm->kecamatan_id) {
                    $ikm->kecamatan()->associate(Kecamatan::where('name', $ikm->kecamatan_id)->first());
                }
                
                // Set kabupaten relationship
                if ($ikm->kabupaten_id) {
                    $ikm->kabupaten()->associate(Kabupaten::find($ikm->kabupaten_id));
                }
                
                // Set provinsi relationship
                if ($ikm->provinsi_id) {
                    $ikm->provinsi()->associate(Provinsi::find($ikm->provinsi_id));
                }

                // Set type industry relationship
                if ($ikm->jenis_usaha_id) {
                    $ikm->typeIndustry()->associate(TypeIndustry::find($ikm->jenis_usaha_id));
                }

                // Set type product relationship
                if ($ikm->jenis_produk_id) {
                    $ikm->typeProduct()->associate(TypeProduct::find($ikm->jenis_produk_id));
                }
                
                $ikm->save();
            }
            
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }
    }
}
