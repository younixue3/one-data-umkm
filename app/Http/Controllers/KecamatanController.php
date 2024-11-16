<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Kecamatan\StoreKecamatanRequest;
use App\Http\Requests\Kecamatan\UpdateKecamatanRequest;
use App\Models\Kecamatan;
use App\Services\KecamatanServices;

class KecamatanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(KecamatanServices $kecamatanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kecamatans = $kecamatanServices->index();
        return inertia("Kecamatan/Index", compact("kecamatans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Kecamatan/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKecamatanRequest $request, KecamatanServices $kecamatanServices)
    {
        $kecamatanServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $kecamatan, KecamatanServices $kecamatanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kecamatan = $kecamatanServices->show($kecamatan);
        return inertia("Kecamatan/Edit", compact("kecamatan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKecamatanRequest $request, KecamatanServices $kecamatanServices): void
    {
        $kecamatanServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan, KecamatanServices $kecamatanServices)
    {
        $kecamatanServices->destroy($kecamatan);
    }
}
