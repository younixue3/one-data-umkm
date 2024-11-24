<?php

namespace App\Imports;

use App\Models\Bigindustri;
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

class BigindustrieImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    public function model(array $row)
    {
        $kabupaten = isset($row['alamat_pabrik']) ? Kabupaten::where('name', 'like', '%' . $row['alamat_pabrik'] . '%')->first() : null;
        $bigindustrie = new Bigindustri([
            'nama_perusahaan' => (string)($row['nama_perusahaan'] ?? ''),
            'alamat_pabrik' => (string)($row['alamat_pabrik'] ?? ''),
            'sektor_industri' => (string)($row['sektor'] ?? ''),
            'kabupaten_id' => $kabupaten ? $kabupaten->id : null
        ]);

        $bigindustrie->save();
        return $bigindustrie;
    }

    public function rules(): array
    {
        return [
            'nama_perusahaan' => ['nullable', 'string'],
            'alamat_pabrik' => ['nullable', 'string'], 
            'sektor' => ['nullable'],
        ];
    }
}