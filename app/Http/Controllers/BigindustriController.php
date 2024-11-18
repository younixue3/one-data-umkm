<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Bigindustri\StoreBigindustriRequest;
use App\Http\Requests\Bigindustri\UpdateBigindustriRequest;
use App\Models\Bigindustri;
use App\Services\BigindustriServices;

class BigindustriController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(BigindustriServices $bigindustriServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $bigindustris = $bigindustriServices->index();
        return inertia("Dashboard/Bigindustri/Index", compact("bigindustris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Dashboard/Bigindustri/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBigindustriRequest $request, BigindustriServices $bigindustriServices)
    {
        $bigindustriServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bigindustri $bigindustri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $bigindustri, BigindustriServices $bigindustriServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $bigindustri = $bigindustriServices->show($bigindustri);
        return inertia("Dashboard/Bigindustri/Edit", compact("bigindustri"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBigindustriRequest $request, BigindustriServices $bigindustriServices): void
    {
        $bigindustriServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bigindustri $bigindustri, BigindustriServices $bigindustriServices)
    {
        $bigindustriServices->destroy($bigindustri);
    }
}
