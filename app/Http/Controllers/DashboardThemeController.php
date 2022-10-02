<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use App\Models\ThemeImage;
use Illuminate\Http\Request;

class DashboardThemeController extends Controller
{
    public function index()
    {
        return view('dashboard.admin.page.theme.index', [
            "active" => "theme",
            "themes" => Theme::where('is_deleted', false)->latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.page.theme.create', [
            "active" => "theme"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "thumbnail" => "required",
            "description" => "required",
        ]);

        if ($request->file('thumbnail'))
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('theme-thumbnail');

        $theme_id = Theme::create($validatedData)->id;
        if ($request->file('images')) {
            foreach ($request->file('images') as $image) {
                ThemeImage::create([
                    'theme_id' => $theme_id,
                    'image' => $image->store('theme-images')
                ]);
            }
        }
        return redirect('/dashboard/theme')->with('created', $theme_id);
    }

    public function show(Theme $theme)
    {
        //
    }

    public function edit(Theme $theme)
    {
        return view('dashboard.admin.page.theme.edit', [
            "active" => "theme",
            "theme" => $theme,
        ]);
    }

    public function update(Request $request, Theme $theme)
    {
        $validatedData = $request->validate([
            "name" => "required",
            "description" => "required",
        ]);

        if ($request->file('thumbnail'))
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('theme-thumbnail');

        if ($request->file('images')) {
            ThemeImage::where('theme_id', $theme->id)->delete();
            foreach ($request->file('images') as $image) {
                ThemeImage::create([
                    'theme_id' => $theme->id,
                    'image' => $image->store('theme-images')
                ]);
            }
        }

        Theme::where('id', $theme->id)->update($validatedData);
        return redirect('/dashboard/theme')->with('updated', $theme->id);
    }

    public function destroy(Theme $theme)
    {
        Theme::where('id', $theme->id)->update(['is_deleted' => true]);
        return redirect('/dashboard/theme')->with('deleted', $theme->name);
    }

    public function getCategorizedTheme()
    {
        $themes = Theme::where('is_deleted', false)->get();
        return response()->json($themes);
    }
}
