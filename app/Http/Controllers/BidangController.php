<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Bidang\StoreBidangRequest;
use App\Http\Requests\Bidang\UpdateBidangRequest;
use App\Models\Bidang;
use App\Services\BidangServices;

class BidangController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(BidangServices $bidangServices, $category = null)
    {

        $bidangs = $bidangServices->index($category);
        return view("Front.bidang", compact('bidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Bidang/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBidangRequest $request, BidangServices $bidangServices)
    {
        $bidangServices->store($request->getDTO());
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $bidang, BidangServices $bidangServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $bidang = $bidangServices->show($bidang);
        return inertia("Bidang/Edit", compact("bidang"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBidangRequest $request, BidangServices $bidangServices): void
    {
        $bidangServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang, BidangServices $bidangServices)
    {
        $bidangServices->destroy($bidang);
    }
}
