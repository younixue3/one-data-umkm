<?php

namespace App\Http\Requests\Users;

use App\Dtos\Users\UpdateUsersDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string', 'min:8'],
            'password_confirmation' => ['nullable', 'string', 'min:8', 'same:password', 'required_with:password'],
            'role' => ['required', 'string'],
            'bidang' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama user harus diisi',
            'email.required' => 'Email user harus diisi',
            'password.min' => 'Password user harus memiliki minimal 8 karakter',
            'password_confirmation.min' => 'Konfirmasi password user harus memiliki minimal 8 karakter',
            'password_confirmation.same' => 'Konfirmasi password user tidak sama dengan password',
            'password_confirmation.required_with' => 'Konfirmasi password diperlukan jika password diisi',
            'role.required' => 'Role user harus diisi',
            'bidang.required' => 'Bidang user harus diisi',
        ];
    }

    public function getDTO(): UpdateUsersDTO
    {
        return new UpdateUsersDTO($this->validated());
    }
}
