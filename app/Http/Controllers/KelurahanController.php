<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Kelurahan\StoreKelurahanRequest;
use App\Http\Requests\Kelurahan\UpdateKelurahanRequest;
use App\Models\Kelurahan;
use App\Services\KelurahanServices;

class KelurahanController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(KelurahanServices $kelurahanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kelurahans = $kelurahanServices->index();
        return inertia("Kelurahan/Index", compact("kelurahans"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Kelurahan/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKelurahanRequest $request, KelurahanServices $kelurahanServices)
    {
        $kelurahanServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $kelurahan, KelurahanServices $kelurahanServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $kelurahan = $kelurahanServices->show($kelurahan);
        return inertia("Kelurahan/Edit", compact("kelurahan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKelurahanRequest $request, KelurahanServices $kelurahanServices): void
    {
        $kelurahanServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelurahan $kelurahan, KelurahanServices $kelurahanServices)
    {
        $kelurahanServices->destroy($kelurahan);
    }
}
