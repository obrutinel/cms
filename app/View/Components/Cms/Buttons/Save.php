<?php

namespace App\View\Components\Cms\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Save extends Component
{
    public function render(): View
    {
        return view('components.cms.buttons.save');
    }
}
