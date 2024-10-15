<?php

namespace App\Services;

use App\Dtos\Users\StoreUsersDTO;
use App\Dtos\Users\UpdateUsersDTO;
use App\Exceptions\StandardizedException;
use App\Models\User;
use App\Repositories\UsersRepositories;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UsersServices
{
    public function __construct(UsersRepositories $usersRepositories)
    {
        $this->usersRepositories = $usersRepositories;
    }

    public function index(): Collection
    {
        return $this->usersRepositories->index();
    }

    public function show(int $id): ?User
    {
        $promo = $this->usersRepositories->show($id);
        if (!$promo instanceof User) {
            throw new StandardizedException('Users tidak ditemukan.');
        }

        return $promo;
    }

    public function store(StoreUsersDTO $dto): User
    {
        Log::info('Store Users', [
            'DTO' => $dto,
        ]);

        try {
            DB::beginTransaction();
            $data = $this->usersRepositories->store($dto);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            throw new StandardizedException($exception->getMessage());
        }

        return $data;
    }

    public function update(int $id, UpdateUsersDTO $dto): User
    {
        Log::info('Update Users', [
            'DTO' => $dto,
        ]);

        return $this->usersRepositories->update($id,$dto);
    }

    public function destroy(User $users): void
    {
        Log::info('Destory Users', [
            $users->toArray()
        ]);

        $this->usersRepositories->destroy($users->id);
    }
}
