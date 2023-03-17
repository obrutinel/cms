<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Title extends Component
{
    public function __construct(
        public Page $page
    ) {}

    public function shouldRender(): bool
    {
        if(in_array($this->page->type, config('cms.options_disabled.title'))) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.title');
    }
}
