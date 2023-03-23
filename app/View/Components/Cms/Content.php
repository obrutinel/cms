<?php

namespace App\View\Components\Cms;

use App\Models\Page;
use App\Services\ConfigService;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Content extends Component
{
    public array $options = [];

    public function __construct(
        public Page $page
    )
    {
        if (ConfigService::has($this->page->type, 'has_content')) {
            $this->options = ConfigService::get($this->page->type, 'has_content');
        }
    }

    public function shouldRender(): bool
    {
        if (ConfigService::isDisable($this->page->type, 'content')) {
            return false;
        }

        return true;
    }

    public function render(): View
    {
        return view('components.cms.content');
    }
}
