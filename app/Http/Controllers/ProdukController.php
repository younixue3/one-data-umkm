<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Produk\StoreProdukRequest;
use App\Http\Requests\Produk\UpdateProdukRequest;
use App\Models\Produk;
use App\Services\ProdukServices;

class ProdukController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(ProdukServices $produkServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Publikasi/Produk/Index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Produk/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request, ProdukServices $produkServices)
    {
        $produkServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $produk, ProdukServices $produkServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $produk = $produkServices->show($produk);
        return inertia("Produk/Edit", compact("produk"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, ProdukServices $produkServices): void
    {
        $produkServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, ProdukServices $produkServices)
    {
        $produkServices->destroy($produk);
    }
}
