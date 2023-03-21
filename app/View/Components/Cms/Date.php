<?php

namespace App\View\Components\Cms;

use App\Models\Page;
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
        if(array_key_exists($this->page->type, config('cms.options.has_date.types'))) {
            $this->options = config('cms.options.has_date.types.' . $this->page->type);
        }
    }

    public function shouldRender(): bool
    {
        if(array_key_exists($this->page->type, config('cms.options.has_date.types'))) {
            return true;
        }

        return false;
    }


    public function render(): View|Closure|string
    {
        return view('components.cms.date');
    }
}
