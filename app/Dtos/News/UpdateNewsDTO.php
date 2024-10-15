<?php

namespace App\Dtos\News;

class UpdateNewsDTO
{
    public string $title, $content;

    public function __construct($validated)
    {
        $this->title = $validated['title'] ?? null;
        $this->content = $validated['content'] ?? '';
        $this->image = isset($validated['image']) ? $validated['image']->store('image', 'public') : null;
    }
}
