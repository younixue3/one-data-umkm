<?php

namespace App\Imports;

use App\Models\Ikm;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabupaten;
use App\Models\Provinsi;
use App\Models\Typeindustrie;
use App\Models\Typeproduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class IkmImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    public function model(array $row)
    {
        $kelurahan = isset($row['id_kelurahan']) ? Kelurahan::firstOrCreate(['name' => $row['id_kelurahan']]) : null;
        $kecamatan = isset($row['id_kecamatan']) ? Kecamatan::firstOrCreate(['name' => $row['id_kecamatan']]) : null;
        $kabupaten = isset($row['id_kabkota']) ? Kabupaten::where('id', $row['id_kabkota'])->first() : null;
        $provinsi = isset($row['id_prov']) ? Provinsi::where('id', $row['id_prov'])->first() : null;
        $typeIndustry = $row['jenis_industri'] ? Typeindustrie::firstOrCreate(['name' => $row['jenis_industri']]) : null;
        $typeProduct = $row['jenis_produk'] ? Typeproduct::firstOrCreate(['name' => $row['jenis_produk']]) : null;

        $ikm = new Ikm([
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
            'tahun_izin' => (int)($row['tahun_izin'] ?? null),
            'tahun_data' => (int)($row['tahun_data'] ?? null),
            'tenaga_kerja_pria' => (int)($row['tk_pria'] ?? 0),
            'tenaga_kerja_wanita' => (int)($row['tk_wanita'] ?? 0),
            'nilai_investasi' => (float)($row['nilai_investasi'] ?? 0),
            'nilai_kapasitas' => (float)($row['nilai_kapasitas'] ?? 0),
            'satuan_kapasitas' => (string)($row['id_satuan'] ?? ''),
            'nilai_produksi' => (float)($row['nilai_produksi'] ?? 0),
            'nilai_bahan_baku' => (float)($row['nilai_bahan_baku'] ?? 0),
            'status_ekspor' => (string)($row['id_ekspor'] ?? ''),
            'negara_tujuan_ekspor' => (string)($row['negaraa_ekspor'] ?? ''),
            'status_aktif' => (string)($row['id_aktif'] ?? ''),
            'jenis_pembiayaan' => (string)($row['id_pembiayaan'] ?? ''),
        ]);
        // dd($ikm);

        $ikm->save();

        if ($typeIndustry) {
            $ikm->typeindustries()->sync([$typeIndustry->id]);
        }

        if ($typeProduct) {
            $ikm->typeproducts()->sync([$typeProduct->id]); 
        }

        return $ikm;
    }

    public function rules(): array
    {
        return [
            'nama_perusahaan' => ['nullable', 'string'],
            'nama_pemilik' => ['nullable', 'string'],
            'alamat' => ['nullable', 'string'], 
            'id_kelurahan' => ['nullable'],
            'id_kecamatan' => ['nullable'],
            'id_kabkota' => ['nullable'],
            'id_prov' => ['nullable'],
            'id_kbli' => ['nullable'],
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
            'jenis_industri' => ['nullable', 'string'],
            'jenis_produk' => ['nullable', 'string']
        ];
    }
}