<?php

namespace App\Http\Requests\Kabupaten;

use App\Dtos\Kabupaten\StoreKabupatenDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreKabupatenRequest extends FormRequest
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
//            'name' => ['required', 'string'],
//            'price' => ['required', 'numeric'],
//            'description' => ['string'],
//            'start_date' => ['required', 'date'],
//            'end_date' => ['required', 'date'],
//            'image' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:3000'],
        ];
    }

    public function messages(): array
    {
        return [
//            'name.required' => 'Nama kabupaten harus diisi',
//            'price.required' => 'Harga kabupaten harus diisi',
//            'description.required' => 'Deskripsi kabupaten harus diisi',
//            'start_date.required' => 'Tanggal kabupaten harus diisi',
//            'start_date.date' => 'Tanggal kabupaten harus berupa tanggal',
//            'end_date.required' => 'Tanggal kabupaten harus diisi',
//            'end_date.date' => 'Tanggal kabupaten harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): StoreKabupatenDTO
    {
        return new StoreKabupatenDTO($this->validated());
    }
}
