<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
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

    public function store(Request $request): RedirectResponse
    {
        Setting::create($request->all());

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été ajoutée');
    }

    public function edit(Setting $setting): View
    {
        return view('admin.settings.edit', [
            'setting' => $setting,
            'groups' => GroupSetting::all(),
        ]);
    }

    public function update(SettingRequest $request, Setting $setting): RedirectResponse
    {
        $setting->update($request->all());

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été modifié');
    }

    public function destroy(Setting $setting): RedirectResponse
    {
        $setting->delete();

        return redirect()->route('settings.index')
            ->with('success', 'Le paramètre a bien été supprimée');
    }
}
