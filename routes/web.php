<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $src = 'C:/Users/vikas/.gemini/antigravity-ide/brain/511b8773-61dd-450f-9b0d-71fca45bd9cc/rooftop_party_1782624976093.png';
    $dest = public_path('rooftop_party.png');
    if (file_exists($src) && !file_exists($dest)) {
        @copy($src, $dest);
    }
    
    // Copy system.css from Downloads/halo/css
    $srcCss = 'C:/Users/vikas/Downloads/halo/css/system.css';
    $destCss = public_path('css/system.css');
    if (file_exists($srcCss)) {
        if (!is_dir(public_path('css'))) {
            @mkdir(public_path('css'), 0755, true);
        }
        @copy($srcCss, $destCss);
    }
    
    return view('welcome');
});
