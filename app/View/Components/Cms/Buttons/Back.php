<?php

namespace App\View\Components\Cms\Buttons;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Back extends Component
{
    public string $url;

    public function __construct(
        public Page $page
    )
    {
        $this->url = route('pages.list', $this->page->type);
    }

    public function shouldRender(): bool
    {
        if(empty($this->page->parent_id)) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.buttons.back');
    }
}
