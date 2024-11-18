<?php

namespace App\Http\Requests\Ikm;

use App\Dtos\Ikm\StoreIkmDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreIkmRequest extends FormRequest
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
            'jenis_usaha_id.*' => ['required', 'exists:typeindustries,id'],
            'jenis_produk_id.*' => ['required', 'exists:typeproducts,id'],
            'tahun_data' => ['required', 'string'],
            'tenaga_kerja_pria' => ['required', 'numeric', 'min:0'],
            'tenaga_kerja_wanita' => ['required', 'numeric', 'min:0'],
            'nilai_investasi' => ['required', 'numeric', 'min:0'],
            'nilai_kapasitas' => ['required', 'numeric', 'min:0'],
            'satuan_kapasitas' => ['required', 'string'],
            'nilai_produksi' => ['required', 'numeric', 'min:0'],
            'nilai_bahan_baku' => ['required', 'numeric', 'min:0'],
            'status_ekspor' => ['required', 'string'],
            'negara_tujuan_ekspor' => ['nullable', 'string'],
            'status_aktif' => ['required', 'string'],
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
            'jenis_usaha_id.*.required' => 'Jenis usaha harus dipilih',
            'jenis_usaha_id.*.exists' => 'Jenis usaha tidak valid',
            'jenis_produk_id.*.required' => 'Jenis produk harus dipilih',
            'jenis_produk_id.*.exists' => 'Jenis produk tidak valid',
            'tahun_data.required' => 'Tahun data harus diisi',
            'tenaga_kerja_pria.required' => 'Jumlah tenaga kerja pria harus diisi',
            'tenaga_kerja_pria.numeric' => 'Jumlah tenaga kerja pria harus berupa angka',
            'tenaga_kerja_pria.min' => 'Jumlah tenaga kerja pria tidak boleh negatif',
            'tenaga_kerja_wanita.required' => 'Jumlah tenaga kerja wanita harus diisi',
            'tenaga_kerja_wanita.numeric' => 'Jumlah tenaga kerja wanita harus berupa angka',
            'tenaga_kerja_wanita.min' => 'Jumlah tenaga kerja wanita tidak boleh negatif',
            'nilai_investasi.required' => 'Nilai investasi harus diisi',
            'nilai_investasi.numeric' => 'Nilai investasi harus berupa angka',
            'nilai_investasi.min' => 'Nilai investasi tidak boleh negatif',
            'nilai_kapasitas.required' => 'Nilai kapasitas harus diisi',
            'nilai_kapasitas.numeric' => 'Nilai kapasitas harus berupa angka',
            'nilai_kapasitas.min' => 'Nilai kapasitas tidak boleh negatif',
            'satuan_kapasitas.required' => 'Satuan kapasitas harus diisi',
            'nilai_produksi.required' => 'Nilai produksi harus diisi',
            'nilai_produksi.numeric' => 'Nilai produksi harus berupa angka',
            'nilai_produksi.min' => 'Nilai produksi tidak boleh negatif',
            'nilai_bahan_baku.required' => 'Nilai bahan baku harus diisi',
            'nilai_bahan_baku.numeric' => 'Nilai bahan baku harus berupa angka',
            'nilai_bahan_baku.min' => 'Nilai bahan baku tidak boleh negatif',
            'status_ekspor.required' => 'Status ekspor harus diisi',
            'status_aktif.required' => 'Status aktif harus diisi'
        ];
    }

    public function getDTO(): StoreIkmDTO
    {
        return new StoreIkmDTO($this->validated());
    }
}
