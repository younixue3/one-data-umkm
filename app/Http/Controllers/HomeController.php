<?php

namespace App\Http\Controllers;

use App\Services\NewsServices;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NewsServices $newsServices)
    {
        $news = $newsServices->index(3);

        return inertia("Welcome", [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'news' => $news
        ]);
    }

    public function satuData()
    {
        return inertia("SatuData");
    }
}
