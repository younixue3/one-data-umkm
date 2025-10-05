<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\StandardizedException;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\NewsServices;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(NewsServices $newsServices)
    {
        $newss = $newsServices->index();
        return view("Back/news", compact("newss"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Back/newsCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request, NewsServices $newsServices)
    {
        $newsServices->store($request->getDTO());
        return redirect()->route("dashboard.news.index")->with("success", "Berita berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $news, NewsServices $newsServices)
    {
        $news = $newsServices->show($news);
        return view("Back/newsEdit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, NewsServices $newsServices)
    {
        $newsServices->update($request->all()['id'], $request->getDTO());
        return redirect()->route("dashboard.news.index")->with("success", "Berita berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $news, NewsServices $newsServices)
    {
        $newsServices->destroy($news);
        return redirect()->route("dashboard.news.index")->with("success", "Berita berhasil dihapus");
    }
}
