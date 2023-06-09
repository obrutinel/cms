<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use App\Services\ConfigService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Date extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {
        if (ConfigService::has($this->page->type, 'has_date')) {
            $this->options = ConfigService::get($this->page->type, 'has_date');
        }
    }

    public function shouldRender(): bool
    {
        if (ConfigService::isDisable($this->page->type, 'date')) {
            return false;
        }

        if (ConfigService::hasNot($this->page->type, 'has_date')) {
            return false;
        }

        return true;
    }

    public function render(): View|Closure|string
    {
        return view('components.cms.date');
    }
}
