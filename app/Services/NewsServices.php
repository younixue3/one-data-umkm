<?php

namespace App\Services;

use App\Dtos\News\StoreNewsDTO;
use App\Dtos\News\UpdateNewsDTO;
use App\Exceptions\StandardizedException;
use App\Models\News;
use App\Repositories\NewsRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NewsServices
{
    protected NewsRepositories $newsRepositories;

    public function __construct(NewsRepositories $newsRepositories)
    {
        $this->newsRepositories = $newsRepositories;
    }

    public function index(int $take = null, int $paginate = null, string $category = 'umum'): Collection
    {
        if ($take) {
            return $this->newsRepositories->index($take, $category);
        }

        if ($paginate) {
            return $this->newsRepositories->index($paginate, $category);
        }

        return $this->newsRepositories->index($category);
    }

    public function show(int $id): ?News
    {
        $news = $this->newsRepositories->show($id);
        if (!$news instanceof News) {
            throw new StandardizedException('News tidak ditemukan.');
        }

        // Only allow the owner to view
        if ($news->user_id !== Auth::id()) {
            throw new StandardizedException('Anda tidak memiliki akses untuk melihat News ini.');
        }

        return $news;
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
        $news = $this->newsRepositories->show($id);
        if (!$news instanceof News) {
            throw new StandardizedException('News tidak ditemukan.');
        }

        // Only allow the owner to update
        if ($news->user_id !== Auth::id()) {
            throw new StandardizedException('Anda tidak memiliki akses untuk mengubah News ini.');
        }

        Log::info('Update News', [
            'DTO' => $dto,
        ]);

        return $this->newsRepositories->update($id, $dto);
    }

    public function destroy(News $news): void
    {
        // Only allow the owner to delete
        if ($news->user_id !== Auth::id()) {
            throw new StandardizedException('Anda tidak memiliki akses untuk menghapus News ini.');
        }

        Log::info('Destroy News', [
            $news->toArray()
        ]);

        $this->newsRepositories->destroy($news->id);
    }
}
