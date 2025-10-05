<?php

namespace App\Dtos\Users;

class UpdateUsersDTO
{
    public string $name;
    public string $email;
    public ?string $password = null;
    public string $bidang;
    public string $role;

    public function __construct(array $validated)
    {
        $this->name = $validated['name'];
        $this->email = $validated['email'];
        $this->bidang = $validated['bidang'];
        $this->role = $validated['role'];
        if (isset($validated['password'])) {
            $this->password = $validated['password'];
        }
    }
}
