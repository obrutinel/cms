<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Flash extends Component
{
    public function __construct(
        //public string $type,
        public array $messages,
    ) {}

    public function shouldRender(): bool
    {
        return !$this->messages;
    }

    public function render(): View
    {
        return view('components.admin.flash');
    }
}
