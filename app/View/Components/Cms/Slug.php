<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use App\Services\ConfigService;
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
        if (ConfigService::isDisable($this->page->type, 'slug')) {
            return false;
        }

        return true;
    }

    public function render(): View|Closure|string
    {
        return view('components.cms.slug');
    }
}
