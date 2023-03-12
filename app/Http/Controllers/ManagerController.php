<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Services\TemplateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManagerController extends Controller
{
    public function index(): View
    {
        return view('admin.manager.index', [
            'pages' => Page::paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('admin.manager.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'sometimes',
            'slug' => 'sometimes|max:255|unique:pages',
        ]);

        if(!$request->has('is_publish')) {
            $validatedData['is_publish'] = false;
        }

        Page::create($validatedData);

        return redirect()->route('manager.index')
            ->with('success', 'La page a bien été ajoutée');
    }

    public function edit(int $id): View
    {
        return view('admin.manager.edit', [
            'page' => Page::findOrFail($id),
            'types' => Page::distinct()->orderBy('title')->get(),
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        (new TemplateService($request->type))->create();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'parent_id' => 'sometimes',
            'type' => 'sometimes',
            'is_publish' => 'sometimes|boolean',
            'slug' => 'sometimes|max:255|unique:pages,slug,'.$id,
        ]);

        if(!$request->has('is_publish')) {
            $validatedData['is_publish'] = false;
        }

        $page = Page::findOrFail($id);
        $page->update($validatedData);
        $page->save();



        return redirect()->route('manager.index')
            ->with('success', 'La page a bien été modifiée');
    }

    public function destroy(int $id): RedirectResponse
    {
        Page::destroy($id);

        return redirect()->route('manager.index')
            ->with('success', 'La page a bien été supprimée');
    }
}
