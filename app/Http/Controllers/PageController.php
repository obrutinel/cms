<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePageRequest;
use App\Models\Page;
use App\Services\ImageService;
use App\Services\TemplateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PageController extends Controller
{
    public function index(string $type, int $id = null): View
    {
        (new TemplateService())
            ->setViewPath(config('cms.back_views_path'))
            ->setBladeName($type)
            ->copy();

        $pages = Page::where('type', $type)
            ->paginate(10);

        return view('admin.pages.'.$type, [
            'pages' => $pages,
            'parent_id' => $page->id ?? null,
            'type' => $type,
            'id' => $id,
            'options' => config('cms.options.has_list.type')
        ]);
    }

    public function create(string $type, int $id = null): RedirectResponse
    {
        $page = Page::create([
            'title' => 'A remplir',
            'type' => $type,
            'parent_id' => $id ?? null,
        ]);

        $page->slug = 'page-' . $page->id;
        $page->save();

        return redirect()->route('pages.edit', $page->id);
    }

    public function edit(int $id): View
    {
        return view('admin.pages.edit', [
            'page' => Page::findOrFail($id)
        ]);
    }

    public function update(UpdatePageRequest $request, Page $page): RedirectResponse
    {
        $page->update($request->all());

        if($request->save == 'exit') {
            return redirect()->route('pages.list', $page->type)
                ->with('success', 'La page a bien été modifiée');
        }

        return redirect()->route('pages.edit', $page->id)
            ->with('success', 'La page a bien été modifiée');
    }

    public function destroy(Page $page): RedirectResponse
    {
        (new ImageService($page))->delete();

        Page::destroy($page->id);

        return redirect()->route('pages.list', [$page->type, $page->parent_id])
            ->with('success', 'La page a bien été supprimée');
    }
}
