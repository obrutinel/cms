<?php

namespace App\View\Components\Cms;

use App\Models\Page;
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
        if(in_array($this->page->type, config('cms.options_disabled.types.meta'))) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.meta');
    }
}
