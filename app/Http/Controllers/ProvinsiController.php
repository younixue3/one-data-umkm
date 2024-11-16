<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Provinsi\StoreProvinsiRequest;
use App\Http\Requests\Provinsi\UpdateProvinsiRequest;
use App\Models\Provinsi;
use App\Services\ProvinsiServices;

class ProvinsiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(ProvinsiServices $provinsiServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $provinsis = $provinsiServices->index();
        return inertia("Provinsi/Index", compact("provinsis"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Provinsi/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProvinsiRequest $request, ProvinsiServices $provinsiServices)
    {
        $provinsiServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Provinsi $provinsi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $provinsi, ProvinsiServices $provinsiServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $provinsi = $provinsiServices->show($provinsi);
        return inertia("Provinsi/Edit", compact("provinsi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProvinsiRequest $request, ProvinsiServices $provinsiServices): void
    {
        $provinsiServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provinsi $provinsi, ProvinsiServices $provinsiServices)
    {
        $provinsiServices->destroy($provinsi);
    }
}
