<?php

namespace App\Services;

use App\Dtos\Typeproduct\StoreTypeproductDTO;
use App\Dtos\Typeproduct\UpdateTypeproductDTO;
use App\Exceptions\StandardizedException;
use App\Models\Typeproduct;
use App\Repositories\TypeproductRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TypeproductServices
{
    public function __construct(TypeproductRepositories $typeproductRepositories)
    {
        $this->typeproductRepositories = $typeproductRepositories;
    }

    public function index(): Collection
    {
        return $this->typeproductRepositories->index();
    }

    public function show(int $id): ?Typeproduct
    {
        $promo = $this->typeproductRepositories->show($id);
        if (!$promo instanceof Typeproduct) {
            throw new StandardizedException('Typeproduct tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreTypeproductDTO $dto): Typeproduct
    {
        Log::info('Store Typeproduct', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->typeproductRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateTypeproductDTO $dto): Typeproduct
    {
        Log::info('Update Typeproduct', [
            'DTO' => $dto,
        ]);

        return $this->typeproductRepositories->update($id,$dto);
    }

    public function destroy(Typeproduct $typeproduct): void
    {
        Log::info('Destory Typeproduct', [
            $typeproduct->toArray()
        ]);

        $this->typeproductRepositories->destroy($typeproduct->id);
    }
}
