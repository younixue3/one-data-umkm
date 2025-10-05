<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Bigindustri\StoreBigindustriRequest;
use App\Http\Requests\Bigindustri\UpdateBigindustriRequest;
use App\Models\Bigindustri;
use App\Services\BigindustriServices;
use Illuminate\Http\Request;

class BigindustriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BigindustriServices $bigindustriServices)
    {
        $bigindustris = $bigindustriServices->index();
        return view("Back/bigIndustri", compact("bigindustris"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Back/bigIndustriCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBigindustriRequest $request, BigindustriServices $bigindustriServices)
    {
        $bigindustriServices->store($request->getDTO());
        return redirect()->route("dashboard.bigindustri.index")->with("success", "Industri besar berhasil ditambahkan");
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
    public function edit(int $bigindustri, BigindustriServices $bigindustriServices)
    {
        $bigindustri = $bigindustriServices->show($bigindustri);
        return view("Back/bigIndustriEdit", compact("bigindustri"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBigindustriRequest $request, BigindustriServices $bigindustriServices)
    {
        $bigindustriServices->update($request->all()['id'], $request->getDTO());
        return redirect()->route("dashboard.bigindustri.index")->with("success", "Industri besar berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bigindustri $bigindustri, BigindustriServices $bigindustriServices)
    {
        $bigindustriServices->destroy($bigindustri);
        return redirect()->route("dashboard.bigindustri.index")->with("success", "Industri besar berhasil dihapus");
    }

    /**
     * Import data from Excel file.
     */
    public function import(Request $request, BigindustriServices $bigindustriServices)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        $bigindustriServices->import($request->file('file'));
    }
}
