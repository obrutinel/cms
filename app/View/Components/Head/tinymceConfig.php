<?php

namespace App\View\Components\Head;

use Illuminate\View\Component;
use Illuminate\View\View;

class tinymceConfig extends Component
{
    public function render(): View
    {
        return view('components.head.tinymce-config');
    }
}
