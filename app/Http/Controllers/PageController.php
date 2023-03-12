<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use MongoDB\Driver\Session;

class PageController extends Controller
{
    public function index(string $type): View
    {
        $pages = Page::where('type', $type)
            ->paginate(10);

        return view('admin.pages.index', [
            'pages' => $pages,
            'parent_id' => $page->id ?? null,
            'type' => $type,
            'options' => config('cms.options.has_list.type')
        ]);
    }

    public function create(string $type = null): View
    {
        return view('admin.pages.edit', [
            'type' => $type
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'sometimes',
            'type' => 'sometimes',
            'is_publish' => 'sometimes|boolean',
            'slug' => 'sometimes|max:255|unique:pages',
        ]);

        if(!$request->has('is_publish')) {
            $validatedData['is_publish'] = false;
        }

        Page::create($validatedData);

        return redirect()->route('pages.list', $request->get('type'))
            ->with('success', 'La page a bien été ajoutée');
    }

    public function edit(int $id): View
    {
        return view('admin.pages.edit', [
            'page' => Page::findOrFail($id),
            'options' => config('cms')
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'sometimes',
            'meta_title' => 'sometimes',
            'meta_desc' => 'sometimes',
            'is_publish' => 'sometimes|boolean',
            'slug' => 'sometimes|max:255|unique:pages,slug,'.$id,
        ]);

        if(!$request->has('is_publish')) {
            $validatedData['is_publish'] = false;
        }

        $page = Page::findOrFail($id);
        $page->update($validatedData);
        $page->save();

        if($request->save == 'exit') {
            return redirect()->route('pages.list', $page->type)
                ->with('success', 'La page a bien été modifiée');
        }

        return redirect()->route('pages.edit', $id)
            ->with('success', 'La page a bien été modifiée');
    }

    public function destroy(int $id): RedirectResponse
    {
        Page::destroy($id);

        return redirect()->route('pages.index')
            ->with('success', 'La page a bien été supprimée');
    }
}
