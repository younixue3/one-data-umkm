<?php

namespace App\Http\Controllers\Dashboard;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Bidang\StoreBidangRequest;
use App\Http\Requests\Bidang\UpdateBidangRequest;
use App\Models\Bidang;
use App\Services\BidangServices;
use App\Http\Controllers\Controller;

class BidangController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(BidangServices $bidangServices, $category = null)
    {
        $bidangs = $bidangServices->index($category);
        return view("Back/bidang", compact('bidangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Back/bidangCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBidangRequest $request, BidangServices $bidangServices)
    {
        $bidangServices->store($request->getDTO());
        return redirect()->route('dashboard.bidang.index')->with('success', 'Bidang berhasil ditambahkan');
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
    public function edit(int $bidang, BidangServices $bidangServices)
    {
        $bidang = $bidangServices->show($bidang);
        return view("Back/bidangEdit", compact("bidang"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBidangRequest $request, BidangServices $bidangServices)
    {
        $bidangServices->update($request->all()['id'], $request->getDTO());
        return redirect()->route('dashboard.bidang.index')->with('success', 'Bidang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bidang $bidang, BidangServices $bidangServices)
    {
        $bidangServices->destroy($bidang);
        return redirect()->route('dashboard.bidang.index')->with('success', 'Bidang berhasil dihapus');
    }
}
