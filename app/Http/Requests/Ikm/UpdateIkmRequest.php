<?php

namespace App\Http\Requests\Ikm;

use App\Dtos\Ikm\UpdateIkmDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIkmRequest extends FormRequest
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
            'nama_pemilik' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'kelurahan_id' => ['required', 'exists:kelurahans,id'],
            'kecamatan_id' => ['required', 'exists:kecamatans,id'],
            'kabupaten_id' => ['required', 'exists:kabupatens,id'],
            'provinsi_id' => ['required', 'exists:provinsis,id'],
            'kontak_person' => ['nullable', 'string'],
            'no_hp' => ['nullable', 'string'],
            'email' => ['nullable', 'email'],
            'nomor_izin' => ['nullable', 'string'],
            'tahun_izin' => ['nullable', 'string'],
            'jenis_usaha_id' => ['required', 'exists:typeindustries,id'],
            'jenis_produk_id' => ['required', 'exists:typeproducts,id'],
            'tahun_data' => ['required', 'string'],
            'tenaga_kerja_pria' => ['required', 'string'],
            'tenaga_kerja_wanita' => ['required', 'string'],
            'nilai_investasi' => ['required', 'string'],
            'nilai_kapasitas' => ['required', 'string'],
            'satuan_kapasitas' => ['required', 'string'],
            'nilai_produksi' => ['required', 'string'],
            'nilai_bahan_baku' => ['required', 'string'],
            'status_ekspor' => ['string'],
            'negara_tujuan_ekspor' => ['nullable', 'string'],
            'status_aktif' => ['string'],
            'jenis_pembiayaan' => ['nullable', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'nama_perusahaan.required' => 'Nama perusahaan harus diisi',
            'nama_pemilik.required' => 'Nama pemilik harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'kelurahan_id.required' => 'Kelurahan harus dipilih',
            'kelurahan_id.exists' => 'Kelurahan tidak valid',
            'kecamatan_id.required' => 'Kecamatan harus dipilih',
            'kecamatan_id.exists' => 'Kecamatan tidak valid',
            'kabupaten_id.required' => 'Kabupaten harus dipilih',
            'kabupaten_id.exists' => 'Kabupaten tidak valid',
            'provinsi_id.required' => 'Provinsi harus dipilih',
            'provinsi_id.exists' => 'Provinsi tidak valid',
            'email.email' => 'Format email tidak valid',
            'jenis_usaha_id.required' => 'Jenis usaha harus dipilih',
            'jenis_usaha_id.exists' => 'Jenis usaha tidak valid',
            'jenis_produk_id.required' => 'Jenis produk harus dipilih',
            'jenis_produk_id.exists' => 'Jenis produk tidak valid',
            'tahun_data.required' => 'Tahun data harus diisi',
            'tahun_data.string' => 'Tahun data harus berupa teks',
            'tenaga_kerja_pria.required' => 'Jumlah tenaga kerja pria harus diisi',
            'tenaga_kerja_pria.string' => 'Jumlah tenaga kerja pria harus berupa teks',
            'tenaga_kerja_wanita.required' => 'Jumlah tenaga kerja wanita harus diisi',
            'tenaga_kerja_wanita.string' => 'Jumlah tenaga kerja wanita harus berupa teks',
            'nilai_investasi.required' => 'Nilai investasi harus diisi',
            'nilai_investasi.string' => 'Nilai investasi harus berupa teks',
            'nilai_kapasitas.required' => 'Nilai kapasitas harus diisi',
            'nilai_kapasitas.string' => 'Nilai kapasitas harus berupa teks',
            'satuan_kapasitas.required' => 'Satuan kapasitas harus diisi',
            'nilai_produksi.required' => 'Nilai produksi harus diisi',
            'nilai_produksi.string' => 'Nilai produksi harus berupa teks',
            'nilai_bahan_baku.required' => 'Nilai bahan baku harus diisi',
            'nilai_bahan_baku.string' => 'Nilai bahan baku harus berupa teks'
        ];
    }

    public function getDTO(): UpdateIkmDTO
    {
        return new UpdateIkmDTO($this->validated());
    }
}
