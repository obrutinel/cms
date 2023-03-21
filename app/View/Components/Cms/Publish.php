<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Publish extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {
        if(array_key_exists($this->page->type, (array)config('cms.options.has_publish.types'))) {
            $this->options = config('cms.options.has_publish.types.' . $this->page->type);
        }
    }

    public function shouldRender(): bool
    {
        if(in_array($this->page->type, (array)config('cms.options_disabled.types.publish'))) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.publish');
    }
}
