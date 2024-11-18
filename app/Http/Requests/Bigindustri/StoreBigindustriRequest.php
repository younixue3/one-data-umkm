<?php

namespace App\Http\Requests\Bigindustri;

use App\Dtos\Bigindustri\StoreBigindustriDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreBigindustriRequest extends FormRequest
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
            'nama_perusahaan' => ['required', 'string'],
            'alamat_pabrik' => ['required', 'string'],
            'sektor_industri' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_perusahaan.required' => 'Nama perusahaan harus diisi',
            'alamat_pabrik.required' => 'Alamat pabrik harus diisi',
            'sektor_industri.required' => 'Sektor industri harus diisi',
        ];
    }

    public function getDTO(): StoreBigindustriDTO
    {
        return new StoreBigindustriDTO($this->validated());
    }
}
