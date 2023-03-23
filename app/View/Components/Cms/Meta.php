<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use App\Services\ConfigService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {}

    public function shouldRender(): bool
    {
        if (ConfigService::isDisable($this->page->type, 'meta')) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.meta');
    }
}
