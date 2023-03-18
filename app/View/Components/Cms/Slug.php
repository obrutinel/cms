<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slug extends Component
{
    public function __construct(
        public Page $page
    ) {}

    public function shouldRender(): bool
    {
        if (in_array($this->page->type, config('cms.options_disabled.types.slug'))) {
            return false;
        }

        return true;
    }

    public function render(): View|Closure|string
    {
        return view('components.cms.slug');
    }
}
