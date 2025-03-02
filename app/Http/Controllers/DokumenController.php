<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Dokumen\StoreDokumenRequest;
use App\Http\Requests\Dokumen\UpdateDokumenRequest;
use App\Models\Dokumen;
use App\Services\DokumenServices;

class DokumenController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(DokumenServices $dokumenServices)
    {
        return view("Front.dokumen");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Dokumen/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDokumenRequest $request, DokumenServices $dokumenServices)
    {
        $dokumenServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $dokumen, DokumenServices $dokumenServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $dokumen = $dokumenServices->show($dokumen);
        return inertia("Dokumen/Edit", compact("dokumen"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDokumenRequest $request, DokumenServices $dokumenServices): void
    {
        $dokumenServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dokumen $dokumen, DokumenServices $dokumenServices)
    {
        $dokumenServices->destroy($dokumen);
    }
}
