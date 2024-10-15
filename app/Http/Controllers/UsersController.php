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
    public function index(UsersServices $usersServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $userss = $usersServices->index();
        return inertia("Dashboard/User/Index", compact("userss"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia("Dashboard/User/Create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsersRequest $request, UsersServices $usersServices)
    {
        $usersServices->store($request->getDTO());
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
    public function edit(int $users, UsersServices $usersServices): \Inertia\Response|\Inertia\ResponseFactory
    {
        $users = $usersServices->show($users);
        return inertia("Dashboard/User/Edit", compact("users"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsersRequest $request, UsersServices $usersServices): void
    {
        $usersServices->update($request->all()['id'], $request->getDTO());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users, UsersServices $usersServices)
    {
        $usersServices->destroy($users);
    }
}
