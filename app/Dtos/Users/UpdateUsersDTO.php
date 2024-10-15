<?php

namespace App\Dtos\Users;

class UpdateUsersDTO
{
    public string $name, $email, $password;

    public function __construct($validated)
    {
        $this->name = $validated['name'];
        $this->email = $validated['email'];
        if (isset($validated['password'])) {
            $this->password = $validated['password'];
        }
    }
}
