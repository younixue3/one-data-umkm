<?php

namespace App\Http\Requests\Typeindustrie;

use App\Dtos\Typeindustrie\UpdateTypeindustrieDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTypeindustrieRequest extends FormRequest
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
//            'name.required' => 'Nama typeindustrie harus diisi',
//            'price.required' => 'Harga typeindustrie harus diisi',
//            'description.required' => 'Deskripsi typeindustrie harus diisi',
//            'start_date.required' => 'Tanggal typeindustrie harus diisi',
//            'start_date.date' => 'Tanggal typeindustrie harus berupa tanggal',
//            'end_date.required' => 'Tanggal typeindustrie harus diisi',
//            'end_date.date' => 'Tanggal typeindustrie harus berupa tanggal',
//            'image.image' => 'File harus berupa gambar',
//            'image.mimes' => 'File harus berupa gambar',
//            'image.max' => 'Ukuran file terlalu besar'
        ];
    }

    public function getDTO(): UpdateTypeindustrieDTO
    {
        return new UpdateTypeindustrieDTO($this->validated());
    }
}
