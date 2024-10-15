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

    public function index(): Collection
    {
        return $this->news->all();
    }

    public function show(int $id): ?News
    {
        return $this->news->find($id);
    }

    public function store(StoreNewsDTO $dto): News
    {
        return $this->news->create([
            'title' => $dto->title,
            'content' => $dto->content,
            'image' => $dto->image,
        ]);
    }

    public function update(int $id, UpdateNewsDTO $dto): News
    {
        $updateData = [
            'title' => $dto->title,
            'content' => $dto->content,
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
