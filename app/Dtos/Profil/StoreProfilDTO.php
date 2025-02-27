<?php

namespace App\Dtos\Profil;

class StoreProfilDTO
{
    public string $category;
    public string $description;
    public ?string $image = null;

    public function __construct(array $validated)
    {
        $this->category = $validated['category'];
        $this->description = $validated['description'];
        if (isset($validated['image'])) {
            $this->image = $validated['image']->store('image', 'public');
        }
    }
}
