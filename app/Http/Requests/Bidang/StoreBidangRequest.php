<?php

namespace App\Http\Requests\Bidang;

use App\Dtos\Bidang\StoreBidangDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreBidangRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'category' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:3000'],
        ];
    }

    public function messages(): array
    {
        return [
            'description.required' => 'Deskripsi bidang harus diisi',
            'category.required' => 'Kategori bidang harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, atau jpg',
            'image.max' => 'Ukuran file terlalu besar (maksimal 3MB)'
        ];
    }

    public function getDTO(): StoreBidangDTO
    {
        return new StoreBidangDTO($this->validated());
    }
}
