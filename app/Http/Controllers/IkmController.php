<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Ikm\StoreIkmRequest;
use App\Http\Requests\Ikm\UpdateIkmRequest;
use App\Models\Ikm;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Typeindustrie;
use App\Models\Typeproduct;
use App\Services\IkmServices;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\IkmTemplateExport;

class IkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IkmServices $ikmServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $ikms = $ikmServices->index();
        return inertia("Dashboard/Ikm/Index", compact("ikms"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $jenis_usahas = Typeindustrie::all();
        $jenis_produks = Typeproduct::all();

        return inertia("Dashboard/Ikm/Create", compact(
            'provinsis',
            'kabupatens',
            'kecamatans',
            'kelurahans',
            'jenis_usahas',
            'jenis_produks'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIkmRequest $request, IkmServices $ikmServices): void
    {
        $ikmServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Ikm $ikm, IkmServices $ikmServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Dashboard/Ikm/Show", compact("ikm"));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(Ikm $ikm, IkmServices $ikmServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $ikm = $ikmServices->show($ikm->id);
        return inertia("Dashboard/Ikm/Edit", compact("ikm"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIkmRequest $request, Ikm $ikm, IkmServices $ikmServices): void
    {
        $ikmServices->update($ikm->id, $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ikm $ikm, IkmServices $ikmServices): void
    {
        $ikmServices->destroy($ikm);
    }

    /**
     * Import IKM data from Excel file
     */
    public function import(Request $request, IkmServices $ikmServices): void
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $ikmServices->import($request->file('file'));
    }
}
