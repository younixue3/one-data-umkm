<?php

namespace App\Dtos\Ikm;

class StoreIkmDTO
{
    public string $nama_perusahaan;
    public string $nama_pemilik;
    public string $alamat;
    public string $kelurahan_id;
    public string $kecamatan_id;
    public string $kabupaten_id;
    public string $provinsi_id;
    public ?string $kontak_person;
    public ?string $no_hp;
    public ?string $email;
    public ?string $nomor_izin;
    public ?string $tahun_izin;
    public array $jenis_usaha_id;
    public array $jenis_produk_id;
    public string $tahun_data;
    public string $tenaga_kerja_pria;
    public string $tenaga_kerja_wanita;
    public string $nilai_investasi;
    public string $nilai_kapasitas;
    public string $satuan_kapasitas;
    public string $nilai_produksi;
    public string $nilai_bahan_baku;
    public string $status_ekspor;
    public ?string $negara_tujuan_ekspor;
    public string $status_aktif;
    public ?string $jenis_pembiayaan;

    public function __construct(array $validated)
    {
        $this->nama_perusahaan = $validated['nama_perusahaan'];
        $this->nama_pemilik = $validated['nama_pemilik'];
        $this->alamat = $validated['alamat'];
        $this->kelurahan_id = $validated['kelurahan_id'];
        $this->kecamatan_id = $validated['kecamatan_id'];
        $this->kabupaten_id = $validated['kabupaten_id'];
        $this->provinsi_id = $validated['provinsi_id'];
        $this->kontak_person = $validated['kontak_person'] ?? null;
        $this->no_hp = $validated['no_hp'] ?? null;
        $this->email = $validated['email'] ?? null;
        $this->nomor_izin = $validated['nomor_izin'] ?? null;
        $this->tahun_izin = $validated['tahun_izin'] ?? null;
        $this->jenis_usaha_id = $validated['jenis_usaha_id'];
        $this->jenis_produk_id = $validated['jenis_produk_id'];
        $this->tahun_data = $validated['tahun_data'];
        $this->tenaga_kerja_pria = $validated['tenaga_kerja_pria'];
        $this->tenaga_kerja_wanita = $validated['tenaga_kerja_wanita'];
        $this->nilai_investasi = $validated['nilai_investasi'];
        $this->nilai_kapasitas = $validated['nilai_kapasitas'];
        $this->satuan_kapasitas = $validated['satuan_kapasitas'];
        $this->nilai_produksi = $validated['nilai_produksi'];
        $this->nilai_bahan_baku = $validated['nilai_bahan_baku'];
        $this->status_ekspor = $validated['status_ekspor'] ?? '';
        $this->negara_tujuan_ekspor = $validated['negara_tujuan_ekspor'] ?? null;
        $this->status_aktif = $validated['status_aktif'] ?? '';
        $this->jenis_pembiayaan = $validated['jenis_pembiayaan'] ?? null;
    }
}
