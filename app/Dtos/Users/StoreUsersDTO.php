<?php

namespace App\Dtos\Users;

class StoreUsersDTO
{
    public string $name, $email, $password;

    public function __construct($validated)
    {
        $this->name = $validated['name'];
        $this->email = $validated['email'];
        $this->password = $validated['password'];
    }
}
