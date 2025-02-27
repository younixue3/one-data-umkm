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
    public function index(ProfilServices $profilServices, string $category = 'profil'): Response|ResponseFactory
    {
        $profil = $profilServices->index($category);
        return inertia("Dashboard/Profil/Index", [
            "profil" => $profil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|ResponseFactory
    {
        return inertia("Dashboard/Profil/Create", [
            "categories" => Profil::CATEGORIES
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilRequest $request, ProfilServices $profilServices): void
    {
        $profilServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil): Response|ResponseFactory
    {
        return inertia("Dashboard/Profil/Show", compact("profil"));
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(Profil $profil, ProfilServices $profilServices): Response|ResponseFactory
    {
        $profil = $profilServices->show($profil->id);
        return inertia("Dashboard/Profil/Edit", [
            "profil" => $profil,
            "categories" => Profil::CATEGORIES
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilRequest $request, ProfilServices $profilServices): void
    {
        $profilServices->update($request->validated()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil, ProfilServices $profilServices): void
    {
        $profilServices->destroy($profil);
    }
}
