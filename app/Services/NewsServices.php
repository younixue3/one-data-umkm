<?php

namespace App\Services;

use App\Dtos\News\StoreNewsDTO;
use App\Dtos\News\UpdateNewsDTO;
use App\Exceptions\StandardizedException;
use App\Models\News;
use App\Repositories\NewsRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsServices
{
    public function __construct(NewsRepositories $newsRepositories)
    {
        $this->newsRepositories = $newsRepositories;
    }

    public function index(int $take = null, int $paginate = null): Collection
    {
        if ($take) {
            return $this->newsRepositories->index($take);
        }

        if ($paginate) {
            return $this->newsRepositories->index($paginate);
        }

        return $this->newsRepositories->index();
    }

    public function show(int $id): ?News
    {
        $promo = $this->newsRepositories->show($id);
        if (!$promo instanceof News) {
            throw new StandardizedException('News tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreNewsDTO $dto): News
    {
        Log::info('Store News', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->newsRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateNewsDTO $dto): News
    {
        Log::info('Update News', [
            'DTO' => $dto,
        ]);

        return $this->newsRepositories->update($id,$dto);
    }

    public function destroy(News $news): void
    {
        Log::info('Destory News', [
            $news->toArray()
        ]);

        $this->newsRepositories->destroy($news->id);
    }
}
