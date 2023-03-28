<?php

namespace App\View\Components\Cms\Buttons;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SaveAndBack extends Component
{
    public function __construct(
        public Page $page
    )
    {}

    public function shouldRender(): bool
    {
        if (empty($this->page->parent_id)) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.buttons.save-and-back');
    }
}
