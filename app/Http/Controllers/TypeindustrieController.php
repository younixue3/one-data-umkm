<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Typeindustrie\StoreTypeindustrieRequest;
use App\Http\Requests\Typeindustrie\UpdateTypeindustrieRequest;
use App\Models\Typeindustrie;
use App\Services\TypeindustrieServices;

class TypeindustrieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(TypeindustrieServices $typeindustrieServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $typeindustries = $typeindustrieServices->index();
        return inertia("Typeindustrie/Index", compact("typeindustries"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Typeindustrie/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeindustrieRequest $request, TypeindustrieServices $typeindustrieServices)
    {
        $typeindustrieServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Typeindustrie $typeindustrie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $typeindustrie, TypeindustrieServices $typeindustrieServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $typeindustrie = $typeindustrieServices->show($typeindustrie);
        return inertia("Typeindustrie/Edit", compact("typeindustrie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeindustrieRequest $request, TypeindustrieServices $typeindustrieServices): void
    {
        $typeindustrieServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typeindustrie $typeindustrie, TypeindustrieServices $typeindustrieServices)
    {
        $typeindustrieServices->destroy($typeindustrie);
    }
}
