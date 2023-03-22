<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Buttons extends Component
{
    public function __construct(
        public Page $page
    )
    {
        /*if(array_key_exists($this->page->type, config('cms.options.has_title.types'))) {
            $this->options = config('cms.options.has_title.types.' . $this->page->type);
        }*/
    }

    public function render(): View
    {
        return view('components.cms.buttons');
    }
}
