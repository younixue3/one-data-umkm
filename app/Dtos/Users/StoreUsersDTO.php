<?php

namespace App\Dtos\Users;

class StoreUsersDTO
{
    public string $name;
    public string $email;
    public string $password;
    public string $bidang;
    public string $role;

    public function __construct(array $validated)
    {
        $this->name = $validated['name'];
        $this->email = $validated['email'];
        $this->password = $validated['password'];
        $this->bidang = $validated['bidang'] ?? '';
        $this->role = $validated['role'] ?? '';
    }
}
