<?php

namespace App\View\Components\Cms\Navigation;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Subitem extends Component
{
    public string $isActive = '';

    public function __construct(
        public string $label,
        public string $icon = 'fa-file-alt',
    )
    {

    }

    public function render(): View
    {
        return view('components.cms.navigation.subitem');
    }
}
