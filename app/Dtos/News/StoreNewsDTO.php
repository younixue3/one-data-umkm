<?php

namespace App\Dtos\News;

class StoreNewsDTO
{
    public string $title, $content;

    public function __construct($validated)
    {
        $this->title = $validated['title'] ?? null;
        $this->content = $validated['content'] ?? '';
        if ($validated['image']) {
            $this->image = $validated['image']->store('image', 'public');
        }
    }
}
