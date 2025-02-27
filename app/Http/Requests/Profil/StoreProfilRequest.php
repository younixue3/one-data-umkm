<?php

namespace App\Http\Requests\Profil;

use App\Dtos\Profil\StoreProfilDTO;
use App\Models\Profil;
use Illuminate\Foundation\Http\FormRequest;

class StoreProfilRequest extends FormRequest
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
            'category' => ['required', 'string', 'in:' . implode(',', Profil::CATEGORIES)],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:3000'],
        ];
    }

    public function messages(): array
    {
        return [
            'category.required' => 'Kategori harus diisi',
            'category.string' => 'Kategori harus berupa teks',
            'category.in' => 'Kategori tidak valid',
            'description.required' => 'Deskripsi harus diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'image.file' => 'File harus berupa file',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, atau jpg',
            'image.max' => 'Ukuran file terlalu besar (maksimal 3MB)'
        ];
    }

    public function getDTO(): StoreProfilDTO
    {
        return new StoreProfilDTO($this->validated());
    }
}
