<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil 3 berita terbaru
        $news = \App\Models\News::latest()->take(3)->get();

        $newsCount = \App\Models\News::count();

        // Menghitung jumlah Industri Besar
        $bigIndustriCount = \App\Models\BigIndustri::count();
        
        // Menghitung jumlah UKM
        $ukmCount = \App\Models\Ikm::count();
        
        // Menghitung jumlah galeri
        $galleryCount = 0;
        
        // Menghitung jumlah pengguna
        $userCount = \App\Models\User::count();
        
        // Mengirimkan data berita ke view
        return view("Back.index", compact('news', 'newsCount', 'bigIndustriCount', 'ukmCount', 'galleryCount', 'userCount'));
    }
}
