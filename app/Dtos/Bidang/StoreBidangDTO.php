<?php

namespace App\Dtos\Bidang;

class StoreBidangDTO
{
    public string $description, $category;
    public ?string $image = null;

    public function __construct(array $validated)
    {
        $this->description = $validated['description'];
        $this->category = $validated['category'];
        
        if (isset($validated['image']) && $validated['image']) {
            $this->image = $validated['image']->store('image', 'public');
        }
    }
}
