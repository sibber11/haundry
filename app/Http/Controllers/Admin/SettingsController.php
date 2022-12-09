<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function edit()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        $request->validate([
            'about_top' => 'required|string',
            'about_bot' => 'required|string'
        ]);
        $settings = Settings::first();
        $settings->about_top = $request->input('about_top');
        $settings->about_bot = $request->input('about_bot');
        $settings->save();
        \Flash::success("Settings Saved Succesfully");
        return redirect()->route('admin.settings.edit');
    }
}
