<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\StandardizedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profil\StoreProfilRequest;
use App\Http\Requests\Profil\UpdateProfilRequest;
use App\Models\Profil;
use App\Services\ProfilServices;
use Inertia\Response;
use Inertia\ResponseFactory;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProfilServices $profilServices, string $category = 'profil')
    {
        $profil = $profilServices->index($category);
        return view("Back/profil", [
            "profil" => $profil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Back/profilCreate", [
            "categories" => Profil::CATEGORIES
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilRequest $request, ProfilServices $profilServices)
    {
        $profilServices->store($request->getDTO());
        return redirect()->route("dashboard.profil.index")->with("success", "Profil berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil)
    {
        return view("Back/profilShow", compact("profil"));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(Profil $profil, ProfilServices $profilServices)
    {
        $profil = $profilServices->show($profil->id);
        return view("Back/profilEdit", [
            "profil" => $profil,
            "categories" => Profil::CATEGORIES
        ]);
        return redirect()->route("dashboard.profil.index")->with("success", "Profil berhasil diubah");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilRequest $request, ProfilServices $profilServices)
    {
        $profilServices->update($request->validated()['id'], $request->getDTO());
        return redirect()->route("dashboard.profil.index")->with("success", "Profil berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil, ProfilServices $profilServices)
    {
        $profilServices->destroy($profil);
        return redirect()->route("dashboard.profil.index")->with("success", "Profil berhasil dihapus");
    }
}
