<?php

namespace App\Http\Requests\Pelatihan;

use App\Dtos\Pelatihan\StorePelatihanDTO;
use Illuminate\Foundation\Http\FormRequest;

class StorePelatihanRequest extends FormRequest
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
            'judul' => ['required', 'string'],
            'tahun' => ['required', 'integer', 'digits:4'],
            'kategori' => ['required', 'string', 'in:aspek produksi,aspek sdm,aspek kelembagaan,aspek pemasaran,aspek keuangan'],
            'peserta' => ['required', 'integer'],
            'kelurahan_id' => ['nullable', 'exists:kelurahans,id'],
            'kecamatan_id' => ['nullable', 'exists:kecamatans,id'],
            'kabupaten_id' => ['nullable', 'exists:kabupatens,id'],
            'provinsi_id' => ['nullable', 'exists:provinsis,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul harus diisi',
            'judul.string' => 'Judul harus berupa teks',
            'tahun.required' => 'Tahun harus diisi',
            'tahun.integer' => 'Tahun harus berupa angka',
            'tahun.digits' => 'Tahun harus 4 digit',
            'kategori.required' => 'Kategori harus diisi',
            'kategori.string' => 'Kategori harus berupa teks',
            'kategori.in' => 'Kategori tidak valid',
            'peserta.required' => 'Peserta harus diisi',
            'peserta.integer' => 'Peserta harus berupa angka',
            'kelurahan_id.exists' => 'Kelurahan tidak ditemukan',
            'kecamatan_id.exists' => 'Kecamatan tidak ditemukan',
            'kabupaten_id.exists' => 'Kabupaten tidak ditemukan',
            'provinsi_id.exists' => 'Provinsi tidak ditemukan'
        ];
    }

    public function getDTO(): StorePelatihanDTO
    {
        return new StorePelatihanDTO($this->validated());
    }
}
