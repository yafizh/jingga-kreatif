<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Models\Wedding;

class ThemeController extends Controller
{
    public function getCategorizedTheme()
    {
        $themes = [];
        foreach (Theme::where('is_deleted', false)->get() as $theme) {
            $theme->themeImages;
            $themes[] = $theme;
        }
        return response()->json($themes);
    }
}
