<?php

namespace App\View\Components\Cms\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
    public string $route = '';

    public function __construct(
        public string $label,
        public int $id = 0,
        public string $type = '',
        public string $active = '',
        public string $icon = 'fa-file-alt',
    ) {

        if(!empty($id)) {
            $this->route = route('pages.edit', $id);
        }

        if(!empty($type)) {
            $this->route = route('pages.list', $type);
        }

    }


    public function render(): View
    {
        return view('components.cms.navigation.item');
    }
}
