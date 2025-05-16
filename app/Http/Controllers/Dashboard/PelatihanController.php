<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\StandardizedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pelatihan\StorePelatihanRequest;
use App\Http\Requests\Pelatihan\UpdatePelatihanRequest;
use App\Models\Pelatihan;
use App\Services\PelatihanServices;
use Inertia\Response;
use Inertia\ResponseFactory;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;


class PelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PelatihanServices $pelatihanServices)
    {
        $pelatihan = $pelatihanServices->index();
        return view("Back/pelatihan", [
            "pelatihan" => $pelatihan
        ]);
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

        return view("Back/pelatihanCreate", [
            "categories" => Pelatihan::KATEGORI,
            "provinsis" => $provinsis,
            "kabupatens" => $kabupatens,
            "kecamatans" => $kecamatans,
            "kelurahans" => $kelurahans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelatihanRequest $request, PelatihanServices $pelatihanServices)
    {
        $pelatihanServices->store($request->getDTO());
        return redirect()->route("dashboard.pelatihan.index")->with("success", "Pelatihan berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelatihan $pelatihan)
    {
        return view("Back/pelatihanShow", compact("pelatihan"));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(Pelatihan $pelatihan, PelatihanServices $pelatihanServices)
    {
        $pelatihan = $pelatihanServices->show($pelatihan->id);
        $provinsis = Provinsi::all();
        $kabupatens = Kabupaten::all();
        $kecamatans = Kecamatan::all();
        $kelurahans = Kelurahan::all();

        return view("Back/pelatihanEdit", [
            "pelatihan" => $pelatihan,
            "categories" => Pelatihan::KATEGORI,
            "provinsis" => $provinsis,
            "kabupatens" => $kabupatens,
            "kecamatans" => $kecamatans,
            "kelurahans" => $kelurahans
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelatihanRequest $request, Pelatihan $pelatihan, PelatihanServices $pelatihanServices)
    {
        $pelatihanServices->update($pelatihan->id, $request->getDTO());
        return redirect()->route("dashboard.pelatihan.index")->with("success", "Pelatihan berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelatihan $pelatihan, PelatihanServices $pelatihanServices)
    {
        $pelatihanServices->destroy($pelatihan);
        return redirect()->route("dashboard.pelatihan.index")->with("success", "Pelatihan berhasil dihapus");
    }
}
