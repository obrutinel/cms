<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
            'page' => Page::findOrFail($id),
            'options' => config('cms')
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'sometimes',
            'content' => 'sometimes',
            'meta_title' => 'sometimes',
            'meta_desc' => 'sometimes',
            'is_publish' => 'sometimes|boolean',
            'published_at' => 'sometimes|nullable|date_format:d/m/Y',
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
        $page = Page::findOrFail($id);

        if(!empty($page->image)) {
            $path = public_path('upload/');
            if(file_exists($path.$page->image)) {
                unlink($path.$page->image);
            }
        }

        Page::destroy($id);

        return redirect()->route('pages.list', [$page->type, $page->parent_id])
            ->with('success', 'La page a bien été supprimée');
    }
}
