<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {
        if(array_key_exists($this->page->type, config('cms.options.has_image.types'))) {
            $this->options = config('cms.options.has_image.types.' . $this->page->type);
        }
    }

    public function shouldRender(): bool
    {
        if(in_array($this->page->type, config('cms.options_disabled.types.image'))) {
            return false;
        }

        if(!array_key_exists($this->page->type, config('cms.options.has_image.types'))) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.image');
    }
}
