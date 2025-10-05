<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\News\StoreNewsRequest;
use App\Http\Requests\News\UpdateNewsRequest;
use App\Models\News;
use App\Services\NewsServices;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(NewsServices $newsServices, string $kategori = '')
    {
        $news = $newsServices->index(null,null,$kategori);
        return view("Front.berita", [
            "kategori" => $kategori,
            "news" => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Dashboard/News/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNewsRequest $request, NewsServices $newsServices)
    {
        $newsServices->store($request->getDTO());
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
    public function edit(int $news, NewsServices $newsServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $news = $newsServices->show($news);
        return inertia("Dashboard/News/Edit", compact("news"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, NewsServices $newsServices): void
    {
        $newsServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news, NewsServices $newsServices)
    {
        $newsServices->destroy($news);
    }
}
