<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Typeproduct\StoreTypeproductRequest;
use App\Http\Requests\Typeproduct\UpdateTypeproductRequest;
use App\Models\Typeproduct;
use App\Services\TypeproductServices;

class TypeproductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(TypeproductServices $typeproductServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $typeproducts = $typeproductServices->index();
        return inertia("Typeproduct/Index", compact("typeproducts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Typeproduct/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeproductRequest $request, TypeproductServices $typeproductServices)
    {
        $typeproductServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Typeproduct $typeproduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $typeproduct, TypeproductServices $typeproductServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $typeproduct = $typeproductServices->show($typeproduct);
        return inertia("Typeproduct/Edit", compact("typeproduct"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeproductRequest $request, TypeproductServices $typeproductServices): void
    {
        $typeproductServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Typeproduct $typeproduct, TypeproductServices $typeproductServices)
    {
        $typeproductServices->destroy($typeproduct);
    }
}
