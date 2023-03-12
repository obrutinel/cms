<?php

namespace App\Http\Controllers;

use App\Models\GroupSetting;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function index(): View
    {
        return view('admin.settings.index', [
            'settings' => Setting::paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('admin.settings.create', [
            'groups' => GroupSetting::all()
        ]);
    }

    public function edit(int $id): View
    {
        return view('admin.settings.edit', [
            'setting' => Setting::findOrFail($id),
            'groups' => GroupSetting::all(),
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $page = Setting::findOrFail($id);
        $page->update($request->all());
        $page->save();

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été modifié');
    }

    public function store(Request $request): RedirectResponse
    {
        Setting::create($request->all());

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été ajoutée');
    }

    public function destroy($id): RedirectResponse
    {
        Setting::destroy($id);

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été supprimée');
    }
}
