<?php

namespace App\Http\Requests\Dokumen;

use App\Dtos\Dokumen\StoreDokumenDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreDokumenRequest extends FormRequest
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
//            'name.required' => 'Nama dokumen harus diisi',
//            'price.required' => 'Harga dokumen harus diisi',
//            'description.required' => 'Deskripsi dokumen harus diisi',
//            'start_date.required' => 'Tanggal dokumen harus diisi',
//            'start_date.date' => 'Tanggal dokumen harus berupa tanggal',
//            'end_date.required' => 'Tanggal dokumen harus diisi',
//            'end_date.date' => 'Tanggal dokumen harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): StoreDokumenDTO
    {
        return new StoreDokumenDTO($this->validated());
    }
}
