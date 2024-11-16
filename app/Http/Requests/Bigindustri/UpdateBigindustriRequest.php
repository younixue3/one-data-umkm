<?php

namespace App\Http\Requests\Bigindustri;

use App\Dtos\Bigindustri\UpdateBigindustriDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBigindustriRequest extends FormRequest
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
//            'name.required' => 'Nama bigindustri harus diisi',
//            'price.required' => 'Harga bigindustri harus diisi',
//            'description.required' => 'Deskripsi bigindustri harus diisi',
//            'start_date.required' => 'Tanggal bigindustri harus diisi',
//            'start_date.date' => 'Tanggal bigindustri harus berupa tanggal',
//            'end_date.required' => 'Tanggal bigindustri harus diisi',
//            'end_date.date' => 'Tanggal bigindustri harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): UpdateBigindustriDTO
    {
        return new UpdateBigindustriDTO($this->validated());
    }
}
