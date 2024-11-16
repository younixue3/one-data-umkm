<?php

namespace App\Http\Requests\Provinsi;

use App\Dtos\Provinsi\UpdateProvinsiDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProvinsiRequest extends FormRequest
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
//            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:3000'],
        ];
    }

    public function messages(): array
    {
        return [
//            'name.required' => 'Nama provinsi harus diisi',
//            'price.required' => 'Harga provinsi harus diisi',
//            'description.required' => 'Deskripsi provinsi harus diisi',
//            'start_date.required' => 'Tanggal provinsi harus diisi',
//            'start_date.date' => 'Tanggal provinsi harus berupa tanggal',
//            'end_date.required' => 'Tanggal provinsi harus diisi',
//            'end_date.date' => 'Tanggal provinsi harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): UpdateProvinsiDTO
    {
        return new UpdateProvinsiDTO($this->validated());
    }
}
