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
    public function index(IkmServices $ikmServices)
    {
        $ikms = $ikmServices->index();
        return view("Back/ikm", compact("ikms"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $jenis_usahas = Typeindustrie::all();
        $jenis_produks = Typeproduct::all();

        return view("Back/ikmCreate", compact(
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
    public function store(StoreIkmRequest $request, IkmServices $ikmServices)
    {
        $ikmServices->store($request->getDTO());
        return redirect()->route('dashboard.ikm.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $ikm, IkmServices $ikmServices)
    {
        $ikm = $ikmServices->show($ikm);
        return view("Back/ikmShow", compact("ikm"));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(Ikm $ikm, IkmServices $ikmServices)
    {
        $ikm = $ikmServices->show($ikm->id);
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();
        $jenis_usahas = Typeindustrie::all();
        $jenis_produks = Typeproduct::all();
        return view("Back/ikmEdit", compact(
            "ikm",
            "provinsis",
            "kabupatens",
            "kecamatans",
            "kelurahans",
            "jenis_usahas",
            "jenis_produks"
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIkmRequest $request, Ikm $ikm, IkmServices $ikmServices)
    {
        $ikmServices->update($ikm->id, $request->getDTO());
        return redirect()->route('dashboard.ikm.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ikm $ikm, IkmServices $ikmServices)
    {
        $ikmServices->destroy($ikm);
        return redirect()->route('dashboard.ikm.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Import IKM data from Excel file
     */
    public function import(Request $request, IkmServices $ikmServices)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $ikmServices->import($request->file('file'));
        return redirect()->route('dashboard.ikm.index')->with('success', 'Data berhasil diimpor.');
    }
}
