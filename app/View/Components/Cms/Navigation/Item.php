<?php

namespace App\View\Components\Cms\Navigation;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class Item extends Component
{
    public string $route = '';

    public function __construct(
        public Request $request,
        public string $label,
        public int $id = 0,
        public string $type = '',
        public string $active = '',
        public string $icon = 'fa-file-alt',
    ) {

        if(!empty($id)) {

            $this->route = route('pages.edit', $id);

            if ($this->request->route('page') == $id) {
                $this->active = 'active';
            }
        }

        if(!empty($type)) {

            $this->route = route('pages.list', [$type, $id]);

            if ($this->request->route('page')) {

                $currentId = $this->request->route('page');
                $page = Page::findOrFail($currentId);

                if ($page->type == $type) {
                    $this->active = 'active';
                }
            }

            if ($request->route('type') == $type) {
                $this->active = 'active';
            }

        }

    }

    public function render(): View
    {
        return view('components.cms.navigation.item');
    }
}
