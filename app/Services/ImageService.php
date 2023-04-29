<?php

namespace App\Services;

use App\Models\Page;

class ImageService
{
    private string $uploadPath;
    public function __construct(private Page $page)
    {
        $this->uploadPath = public_path('upload/');
    }

    public function delete(): void
    {
        if(!empty($this->page->image) && file_exists($this->uploadPath.$this->page->image)) {
            unlink($this->uploadPath.$this->page->image);
        }
    }
}