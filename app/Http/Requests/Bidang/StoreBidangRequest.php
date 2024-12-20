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
//            'name.required' => 'Nama bidang harus diisi',
//            'price.required' => 'Harga bidang harus diisi',
//            'description.required' => 'Deskripsi bidang harus diisi',
//            'start_date.required' => 'Tanggal bidang harus diisi',
//            'start_date.date' => 'Tanggal bidang harus berupa tanggal',
//            'end_date.required' => 'Tanggal bidang harus diisi',
//            'end_date.date' => 'Tanggal bidang harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): StoreBidangDTO
    {
        return new StoreBidangDTO($this->validated());
    }
}
