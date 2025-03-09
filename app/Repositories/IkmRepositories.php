<?php

namespace App\Repositories;

use App\Dtos\Ikm\StoreIkmDTO;
use App\Dtos\Ikm\UpdateIkmDTO;
use App\Models\Ikm;
use Illuminate\Support\Collection;

class IkmRepositories
{
    private Ikm $ikm;

    public function __construct(Ikm $ikm)
    {
        $this->ikm = $ikm;
    }

    public function index(): Collection
    {
        return $this->ikm->with(['typeindustries', 'typeproducts'])->get();
    }

    public function show(int $id): ?Ikm
    {
        return $this->ikm->with([
            'typeindustries',
            'typeproducts',
            'kelurahan',
            'kecamatan', 
            'kabupaten',
            'provinsi'
        ])->find($id);
    }

    public function store(StoreIkmDTO $dto): Ikm
    {
        $ikm = $this->ikm->create([
            'nama_perusahaan' => $dto->nama_perusahaan,
            'nama_pemilik' => $dto->nama_pemilik,
            'alamat' => $dto->alamat,
            'kelurahan_id' => $dto->kelurahan_id,
            'kecamatan_id' => $dto->kecamatan_id,
            'kabupaten_id' => $dto->kabupaten_id,
            'provinsi_id' => $dto->provinsi_id,
            'kontak_person' => $dto->kontak_person,
            'no_hp' => $dto->no_hp,
            'email' => $dto->email,
            'nomor_izin' => $dto->nomor_izin,
            'tahun_izin' => $dto->tahun_izin,
            'tahun_data' => $dto->tahun_data,
            'tenaga_kerja_pria' => $dto->tenaga_kerja_pria,
            'tenaga_kerja_wanita' => $dto->tenaga_kerja_wanita,
            'nilai_investasi' => $dto->nilai_investasi,
            'nilai_kapasitas' => $dto->nilai_kapasitas,
            'satuan_kapasitas' => $dto->satuan_kapasitas,
            'nilai_produksi' => $dto->nilai_produksi,
            'nilai_bahan_baku' => $dto->nilai_bahan_baku,
            'status_ekspor' => $dto->status_ekspor,
            'negara_tujuan_ekspor' => $dto->negara_tujuan_ekspor,
            'status_aktif' => $dto->status_aktif,
            'jenis_pembiayaan' => $dto->jenis_pembiayaan
        ]);

        $ikm->typeindustries()->sync($dto->jenis_usaha_id);
        $ikm->typeproducts()->sync($dto->jenis_produk_id);

        return $ikm->load(['typeindustries', 'typeproducts']);
    }

    public function update(int $id, UpdateIkmDTO $dto): Ikm
    {
        $ikm = $this->ikm->findOrFail($id);
        
        $ikm->update([
            'nama_perusahaan' => $dto->nama_perusahaan,
            'nama_pemilik' => $dto->nama_pemilik,
            'alamat' => $dto->alamat,
            'kelurahan_id' => $dto->kelurahan_id,
            'kecamatan_id' => $dto->kecamatan_id,
            'kabupaten_id' => $dto->kabupaten_id,
            'provinsi_id' => $dto->provinsi_id,
            'kontak_person' => $dto->kontak_person,
            'no_hp' => $dto->no_hp,
            'email' => $dto->email,
            'nomor_izin' => $dto->nomor_izin,
            'tahun_izin' => $dto->tahun_izin,
            'tahun_data' => $dto->tahun_data,
            'tenaga_kerja_pria' => $dto->tenaga_kerja_pria,
            'tenaga_kerja_wanita' => $dto->tenaga_kerja_wanita,
            'nilai_investasi' => $dto->nilai_investasi,
            'nilai_kapasitas' => $dto->nilai_kapasitas,
            'satuan_kapasitas' => $dto->satuan_kapasitas,
            'nilai_produksi' => $dto->nilai_produksi,
            'nilai_bahan_baku' => $dto->nilai_bahan_baku,
            'status_ekspor' => $dto->status_ekspor,
            'negara_tujuan_ekspor' => $dto->negara_tujuan_ekspor,
            'status_aktif' => $dto->status_aktif,
            'jenis_pembiayaan' => $dto->jenis_pembiayaan
        ]);

        $ikm->typeindustries()->sync($dto->jenis_usaha_id);
        $ikm->typeproducts()->sync($dto->jenis_produk_id);

        return $ikm->fresh(['typeindustries', 'typeproducts']);
    }

    public function destroy(int $id): bool
    {
        $ikm = $this->ikm->findOrFail($id);
        
        // Delete related records in pivot tables
        $ikm->typeindustries()->detach();
        $ikm->typeproducts()->detach();
        
        return $ikm->delete();
    }
}
