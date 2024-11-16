<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Kabupaten\StoreKabupatenRequest;
use App\Http\Requests\Kabupaten\UpdateKabupatenRequest;
use App\Models\Kabupaten;
use App\Services\KabupatenServices;

class KabupatenController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(KabupatenServices $kabupatenServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kabupatens = $kabupatenServices->index();
        return inertia("Kabupaten/Index", compact("kabupatens"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Kabupaten/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKabupatenRequest $request, KabupatenServices $kabupatenServices)
    {
        $kabupatenServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $kabupaten, KabupatenServices $kabupatenServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kabupaten = $kabupatenServices->show($kabupaten);
        return inertia("Kabupaten/Edit", compact("kabupaten"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKabupatenRequest $request, KabupatenServices $kabupatenServices): void
    {
        $kabupatenServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten, KabupatenServices $kabupatenServices)
    {
        $kabupatenServices->destroy($kabupaten);
    }
}
