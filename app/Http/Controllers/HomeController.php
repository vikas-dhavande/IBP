<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Event;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $stats = [
            'users' => User::count(),
            'events' => Event::count(),
            'cities' => City::where('is_active', true)->count(),
        ];

        return view('welcome', compact('stats'));
    }
}
