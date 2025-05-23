<?php

namespace App\Repositories;

use App\Dtos\Users\StoreUsersDTO;
use App\Dtos\Users\UpdateUsersDTO;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
class UsersRepositories
{
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function index(): Collection
    {
        return $this->users->all();
    }

    public function show(int $id): ?User
    {
        return $this->users->find($id);
    }

    public function store(StoreUsersDTO $dto): User
    {
        return $this->users->create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'role' => $dto->role,
            'bidang' => $dto->bidang,
        ]);
    }

    public function update(int $id, UpdateUsersDTO $dto): User
    {
        $updateData = [
            'name' => $dto->name,
            'email' => $dto->email,
            'role' => $dto->role,
            'bidang' => $dto->bidang,
        ];

        if (isset($dto->password)) {
            $updateData['password'] = Hash::make($dto->password);
        }

        $user = $this->users->find($id);
        $user->name = $dto->name;
        $user->email = $dto->email;
        $user->role = $dto->role;
        $user->bidang = $dto->bidang;
        if (isset($dto->password)) {
            $user->password = Hash::make($dto->password);
        }
        $user->save();
        return $user;
    }

    public function destroy(int $id): bool
    {
        return $this->users->destroy($id);
    }
}
