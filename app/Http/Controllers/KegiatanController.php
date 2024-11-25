<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Kegiatan\StoreKegiatanRequest;
use App\Http\Requests\Kegiatan\UpdateKegiatanRequest;
use App\Models\Kegiatan;
use App\Services\KegiatanServices;

class KegiatanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(KegiatanServices $kegiatanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Publikasi/PelaporanKegiatan/Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Kegiatan/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKegiatanRequest $request, KegiatanServices $kegiatanServices)
    {
        $kegiatanServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $kegiatan, KegiatanServices $kegiatanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kegiatan = $kegiatanServices->show($kegiatan);
        return inertia("Kegiatan/Edit", compact("kegiatan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKegiatanRequest $request, KegiatanServices $kegiatanServices): void
    {
        $kegiatanServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan, KegiatanServices $kegiatanServices)
    {
        $kegiatanServices->destroy($kegiatan);
    }
}
