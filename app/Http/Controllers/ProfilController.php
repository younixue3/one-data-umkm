<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
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
    public function index(ProfilServices $profilServices, $category = 'profil')
    {
        $profil = $profilServices->showByCategory($category);
        return view("Front.profil", [
            "profil" => $profil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response|ResponseFactory
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfilRequest $request, ProfilServices $profilServices): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profil $profil): Response|ResponseFactory
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $profil, ProfilServices $profilServices): Response|ResponseFactory
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfilRequest $request, ProfilServices $profilServices): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profil $profil, ProfilServices $profilServices): void
    {
        //
    }
}
