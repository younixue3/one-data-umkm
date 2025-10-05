<?php

namespace App\Repositories;

use App\Dtos\News\StoreNewsDTO;
use App\Dtos\News\UpdateNewsDTO;
use App\Models\News;
use Illuminate\Support\Collection;

class NewsRepositories
{
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index($category = null): Collection
    {
        return $this->news->where('category', $category)->get();
    }

    public function show(int $id): ?News
    {
        return $this->news->find($id);
    }

    public function store(StoreNewsDTO $dto): News
    {
        return $this->news->create([
            'user_id' => auth()->id(),
            'title' => $dto->title,
            'content' => $dto->content,
            'image' => $dto->image,
            'category' => $dto->category
        ]);
    }

    public function update(int $id, UpdateNewsDTO $dto): News
    {
        $updateData = [
            'title' => $dto->title,
            'content' => $dto->content,
            'category' => $dto->category
        ];

        if ($dto->image) {
            $updateData['image'] = $dto->image;
        }

        $this->news->find($id)->update($updateData);
        return $this->news->find($id);
    }

    public function destroy(int $id): bool
    {
        return $this->news->destroy($id);
    }
}
