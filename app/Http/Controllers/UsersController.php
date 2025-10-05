<?php

namespace App\Http\Controllers;

use App\Exceptions\StandardizedException;
use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use App\Models\Users;
use App\Services\UsersServices;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(UsersServices $usersServices)
    {
        $userss = $usersServices->index();
        return view("Back/user", compact("userss"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Back/userCreate");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request, UsersServices $usersServices)
    {
        $usersServices->store($request->getDTO());
        return redirect()->route('dashboard.user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @throws StandardizedException
     */
    public function edit(int $users, UsersServices $usersServices)
    {
        $user = $usersServices->show($users);
        return view("Back/userEdit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, UsersServices $usersServices)
    {
        $usersServices->update($request->all()['id'], $request->getDTO());
        return redirect()->route('dashboard.user.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users, UsersServices $usersServices)
    {
        $usersServices->destroy($users);
    }
}
