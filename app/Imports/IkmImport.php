<?php

namespace App\Imports;

use App\Models\Ikm;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class IkmImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    public function model(array $row)
    {
        return new Ikm([
            'nama_perusahaan' => (string)($row['nama_perusahaan'] ?? ''),
            'nama_pemilik' => (string)($row['nama_pemilik'] ?? ''),
            'alamat' => (string)($row['jalan'] ?? ''),
            'kelurahan_id' => (string)($row['id_kelurahan'] ?? ''),
            'kecamatan_id' => (string)($row['id_kecamatan'] ?? ''),
            'kabupaten_id' => (string)($row['id_kabkota'] ?? ''),
            'provinsi_id' => (string)($row['id_prov'] ?? ''),
            'kontak_person' => (string)($row['kontak_person'] ?? ''),
            'no_hp' => (string)($row['no_hp'] ?? ''),
            'email' => (string)($row['email'] ?? ''),
            'nomor_izin' => (string)($row['nomor_izin'] ?? ''),
            'tahun_izin' => (string)($row['tahun_izin'] ?? ''),
            'jenis_usaha_id' => (string)($row['id_kbli'] ?? ''),
            'jenis_produk_id' => (string)($row['jenis_produk'] ?? ''),
            'tahun_data' => (string)($row['tahun_data'] ?? ''),
            'tenaga_kerja_pria' => (string)($row['tk_pria'] ?? ''),
            'tenaga_kerja_wanita' => (string)($row['tk_wanita'] ?? ''),
            'nilai_investasi' => (string)($row['nilai_investasi'] ?? ''),
            'nilai_kapasitas' => (string)($row['nilai_kapasitas'] ?? ''),
            'satuan_kapasitas' => (string)($row['id_satuan'] ?? ''),
            'nilai_produksi' => (string)($row['nilai_produksi'] ?? ''),
            'nilai_bahan_baku' => (string)($row['nilai_bahan_baku'] ?? ''),
            'status_ekspor' => (string)($row['id_ekspor'] ?? ''),
            'negara_tujuan_ekspor' => (string)($row['negaraa_ekspor'] ?? ''),
            'status_aktif' => (string)($row['id_aktif'] ?? ''),
            'jenis_pembiayaan' => (string)($row['id_pembiayaan'] ?? ''),
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_perusahaan' => ['nullable', 'string'],
            'nama_pemilik' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'], 
            'kelurahan_id' => ['nullable', 'exists:kelurahans,id'],
            'kecamatan_id' => ['nullable', 'exists:kecamatans,id'],
            'kabupaten_id' => ['nullable', 'exists:kabupatens,id'],
            'provinsi_id' => ['nullable', 'exists:provinsis,id'],
            'jenis_usaha_id' => ['nullable', 'exists:typeindustries,id'],
            'jenis_produk_id' => ['nullable', 'exists:typeproducts,id'],
            'tahun_data' => ['nullable'],
            'tenaga_kerja_pria' => ['nullable'],
            'tenaga_kerja_wanita' => ['nullable'],
            'nilai_investasi' => ['nullable'],
            'nilai_kapasitas' => ['nullable'],
            'satuan_kapasitas' => ['nullable', 'string'],
            'nilai_produksi' => ['nullable'],
            'nilai_bahan_baku' => ['nullable'],
            'status_ekspor' => ['nullable', 'string'],
            'negara_tujuan_ekspor' => ['nullable', 'string'],
            'status_aktif' => ['nullable', 'string'],
            'jenis_pembiayaan' => ['nullable', 'string'],
            'kontak_person' => ['nullable'],
            'no_hp' => ['nullable'],
            'email' => ['nullable'],
            'nomor_izin' => ['nullable'],
            'tahun_izin' => ['nullable'],
        ];
    }
}