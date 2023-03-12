<?php

namespace App\Http\Controllers;

use App\Models\GroupSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.group_settings.index', [
            'groups' => GroupSetting::withCount(['settings'])->paginate(10)
        ]);
    }

    public function create(): View
    {
        return view('admin.group_settings.create');
    }

    public function store(Request $request): RedirectResponse
    {
        GroupSetting::create($request->all());

        return redirect()->route('group_settings.index')
            ->with('success', 'Le groupe a bien été ajouté');
    }



    public function destroy($id): RedirectResponse
    {
        GroupSetting::destroy($id);

        return redirect()->route('group_settings.index')
            ->with('success', 'Le groupe a bien été supprimé');
    }
}
