<?php

namespace App\Imports;

use App\Models\Ikm;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class IkmImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    public function model(array $row)
    {
        $kelurahan = Kelurahan::find($row['id_kelurahan'] ?? null);
        $kecamatan = Kecamatan::find($row['id_kecamatan'] ?? null);
        $kabupaten = Kabupaten::find($row['id_kabkota'] ?? null);
        $provinsi = Provinsi::find($row['id_prov'] ?? null);

        return new Ikm([
            'nama_perusahaan' => (string)($row['nama_perusahaan'] ?? ''),
            'nama_pemilik' => (string)($row['nama_pemilik'] ?? ''),
            'alamat' => (string)($row['jalan'] ?? ''),
            'kelurahan_id' => $kelurahan ? $kelurahan->id : null,
            'kecamatan_id' => $kecamatan ? $kecamatan->id : null,
            'kabupaten_id' => $kabupaten ? $kabupaten->id : null,
            'provinsi_id' => $provinsi ? $provinsi->id : null,
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
            'id_kelurahan' => ['nullable', 'exists:kelurahans,id'],
            'id_kecamatan' => ['nullable', 'exists:kecamatans,id'],
            'id_kabkota' => ['nullable', 'exists:kabupatens,id'],
            'id_prov' => ['nullable', 'exists:provinsis,id'],
            'id_kbli' => ['nullable', 'exists:typeindustries,id'],
            'jenis_produk' => ['nullable', 'exists:typeproducts,id'],
            'tahun_data' => ['nullable'],
            'tk_pria' => ['nullable'],
            'tk_wanita' => ['nullable'],
            'nilai_investasi' => ['nullable'],
            'nilai_kapasitas' => ['nullable'],
            'id_satuan' => ['nullable', 'string'],
            'nilai_produksi' => ['nullable'],
            'nilai_bahan_baku' => ['nullable'],
            'id_ekspor' => ['nullable', 'string'],
            'negaraa_ekspor' => ['nullable', 'string'],
            'id_aktif' => ['nullable', 'string'],
            'id_pembiayaan' => ['nullable', 'string'],
            'kontak_person' => ['nullable'],
            'no_hp' => ['nullable'],
            'email' => ['nullable'],
            'nomor_izin' => ['nullable'],
            'tahun_izin' => ['nullable'],
        ];
    }
}