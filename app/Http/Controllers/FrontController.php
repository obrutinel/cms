<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class FrontController extends Controller
{
    public function index(Page $page): View
    {
        $view = $page->type;

        if(empty($view)) {
            $page = Page::where('type', 'home')->firstOrFail();
            $view = 'home';
        }

        return view('frontend.pages.'.$view, [
            'page' => $page
        ]);
    }
}
