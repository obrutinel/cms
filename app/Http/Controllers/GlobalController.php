<?php

namespace App\Http\Controllers;

use App\Models\GroupSetting;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalController extends Controller
{
    public function edit(): View
    {
        $groups = GroupSetting::select(['name', 'id'])
            ->with(['settings' => function($query){
                $query->groupBy('id');
            }])->get();

        return view('admin.globals.edit', [
            'groups' => $groups
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = [];

        foreach ($request['settings'] as $id => $value) {
            $data[] = [
                'id' => $id,
                'value' => $value
            ];
        }

        Setting::upsert($data, ['id'], ['value']);

        return redirect()->route('globals.edit')
            ->with('success', 'Les paramètres ont bien été enregistrés');
    }
}
