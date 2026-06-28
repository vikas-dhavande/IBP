<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $src = 'C:/Users/vikas/.gemini/antigravity-ide/brain/511b8773-61dd-450f-9b0d-71fca45bd9cc/rooftop_party_1782624976093.png';
    $dest = public_path('rooftop_party.png');
    if (file_exists($src) && !file_exists($dest)) {
        @copy($src, $dest);
    }
    return view('welcome');
});
