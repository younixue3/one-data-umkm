<?php

namespace App\Repositories;

use App\Dtos\Profil\StoreProfilDTO;
use App\Dtos\Profil\UpdateProfilDTO;
use App\Models\Profil;
use Illuminate\Support\Collection;

class ProfilRepositories
{
    public function __construct(Profil $profil)
    {
        $this->profil = $profil;
    }

    public function index($category): Collection
    {
        return $this->profil->all();
    }

    public function showByCategory(string $category): ?Profil
    {
        return $this->profil->where('category', $category)->get()->first();
    }

    public function show(int $id): ?Profil
    {
        return $this->profil->find($id);
    }

    public function store(StoreProfilDTO $dto): Profil
    {
        return $this->profil->create([
            'category' => $dto->category,
            'description' => $dto->description,
            'image' => $dto->image
        ]);
    }

    public function update(int $id, UpdateProfilDTO $dto): Profil
    {
        $profil = $this->profil->findOrFail($id);
        
        $updateData = [
            'category' => $dto->category,
            'description' => $dto->description,
        ];

        if ($dto->image) {
            $updateData['image'] = $dto->image;
        }

        $profil->update($updateData);
        return $profil;
    }

    public function destroy(int $id): bool
    {
        $profil = $this->profil->findOrFail($id);
        return $profil->delete();
    }
}
