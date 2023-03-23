<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use App\Services\ConfigService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Excerpt extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {
        if (ConfigService::has($this->page->type, 'has_excerpt')) {
            $this->options = ConfigService::get($this->page->type, 'has_excerpt');
        }
    }

    public function shouldRender(): bool
    {
        if (ConfigService::isDisable($this->page->type, 'excerpt')) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.excerpt');
    }
}
