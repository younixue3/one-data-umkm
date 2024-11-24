import { Head } from '@inertiajs/react';
import SatuDataLayout from '@/Layouts/SatuDataLayout';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';
import { Button } from '@/Components/ui/button';
import { useState, useEffect, useRef } from 'react';
import Map from 'ol/Map';
import View from 'ol/View';
import TileLayer from 'ol/layer/Tile';
import OSM from 'ol/source/OSM';
import { fromLonLat } from 'ol/proj';

export default function Pelatihan() {
  const [selectedKabupaten, setSelectedKabupaten] = useState<string>('all');
  const mapRef = useRef<HTMLDivElement>(null);
  const mapInstanceRef = useRef<Map | null>(null);

  useEffect(() => {
    if (mapRef.current && !mapInstanceRef.current) {
      // Initialize map
      const map = new Map({
        target: mapRef.current,
        layers: [
          new TileLayer({
            source: new OSM()
          })
        ],
        view: new View({
          center: fromLonLat([117.0794, 3.3333]), // Center on Kalimantan Utara
          zoom: 8
        })
      });

      mapInstanceRef.current = map;
    }

    return () => {
      if (mapInstanceRef.current) {
        mapInstanceRef.current.setTarget(undefined);
        mapInstanceRef.current = null;
      }
    };
  }, []);

  const pelatihanData = [
    // Bulungan
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'KEWIRAUSAHAAN BAGI PEMULA (UMKM)',
      kabupaten: 'Bulungan',
      peserta: 45,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'BORDIR (INDUSTRI)',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'SERTIFIKAT HALAL',
      kabupaten: 'Bulungan',
      peserta: 9,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Kewirausahaan Bagi Pemula (UMKM)',
      kabupaten: 'Bulungan',
      peserta: 45,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Batako Press (INDUSTRI)',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Teknis Pengolahan Merica dan Kopi (industri)',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Leadership dan Manajerial Koperasi (UMKM)',
      kabupaten: 'Bulungan',
      peserta: 55,
      tahun: 2016
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Penyemaian dan Penanaman Lada (UMKM)',
      kabupaten: 'Bulungan',
      peserta: 45,
      tahun: 2016
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Servis Sepeda Motor Bagi Pemuda/Anak Putus Sekolah (UMKM)',
      kabupaten: 'Bulungan',
      peserta: 46,
      tahun: 2016
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pembuatan Kapal Tradisional / Kapal Kayu',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Salon Bagi Wanita Wirausaha Pemula di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Membatik bagi Wirausaha Pemula di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengembangan Jaringan Pemasaran Berbasis Online di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) Angkatan I',
      kabupaten: 'Bulungan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis Membatik WUB IKM Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis WUB IKM Tenun Serat Alam Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis WUB IKM Olahan Produk Buah Lokal Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis E-Commerce WUB IKM Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2017
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'PELATIHAN KETERAMPILAN MENJAHIT',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Sosialisasi dan Kemitraan Dengan UMKM dan Perbankan, dengan tema "Kemitraan yang Ideal Menuju Kemandirian Koperasi dan UKM" (Peserta 5 Kabupaten/Kota)',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Membatik',
      kabupaten: 'Bulungan',
      peserta: 55,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Manajemen Koperasi',
      kabupaten: 'Bulungan',
      peserta: 60,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Koperasi Sekolah',
      kabupaten: 'Bulungan',
      peserta: 60,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Laporan Akuntansi Usaha Mikro',
      kabupaten: 'Bulungan',
      peserta: 40,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Olahan Makanan Berbahan Tepung Ikan Gedung BPUKecamatan Bunyu',
      kabupaten: 'Bulungan',
      peserta: 60,
      tahun: 2018
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Keterampilan Menggunakan Kain Perca',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Sosialisasi Pedagang Pasar Modern Panca Agung)/ Tanjung Palas Utara',
      kabupaten: 'Bulungan',
      peserta: 60,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pembukuan Koperasi dan Laporan Rapat Anggota Tahunan (RAT) bagi Wirausaha Pemula',
      kabupaten: 'Bulungan',
      peserta: 50,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Perkoperasian bagi Wirausaha Pemula [WUP] DI UKM Center',
      kabupaten: 'Bulungan',
      peserta: 75,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Kewirausahaan Olahaan Makanan Berbahan Lokal',
      kabupaten: 'Bulungan',
      peserta: 50,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Fasilitasi Sertifikasi Halal Bagi IKM',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis 25 WUB IKM Sandang (Menjahit)',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis 25 WUB IKM Servis Elektronik Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Bimbingan Teknis 25 WUB IKM Membatik (Tingkat Lanjutan) Di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI MASKER KAIN BAGI 25 WIRAUSAHA IKM KONVEKSI YANG TERDAMPAK COVID 19 DI KABUPATEN BULUNGAN',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Managemen Koperasi dan Pembukuan Koperasi di Kabupaten Tanjung Selor',
      kabupaten: 'Bulungan',
      peserta: 50,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pembuatan Makanan Berbahan Dasar Sumber Daya Alam (SDA) Lokal Di Salimbatu dan Kabupaten Tana Tidung',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Teknik Pengembangan Strategi Desain Kemasan Dan Branding Produk UMKM di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 34,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD Mangkupadi (Karang taruna)',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD Desa Long Bia',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD Gedung Pelatihan Desa Tanjung Agung',
      kabupaten: 'Bulungan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Literasi Keuangan Bagi Usaha Mikro Angkatan I',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Literasi Keuangan Bagi Usaha Mikro Angkatan I',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Standarisasi Produk Pangan dan Strategi Digital Marketing Angkatan ke I (Kewirausahaan Bagi Pelaku Penjamah Makanan)',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Desain Kemasan Produk Angkatan I',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Standarisasi Produk Pangan Angkatan ke II (Kewirausahaan Bagi Pelaku Penjamah Makanan)',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Layanan Bantuan Hukum Bagi Pelaku UKM',
      kabupaten: 'Bulungan',
      peserta: 80,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Manajemen Pemasaran dan Komunikasi Bisnis',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Manajemen Partisipasi Anggota Koperasi',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Menyusun Strategi Pemasaran Produk',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengembangan Desain Produk Bagi Pelaku UMKM',
      kabupaten: 'Bulungan',
      peserta: 30,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Layanan Bantuan Hukum Bagi Pelaku UKM Angkatan III',
      kabupaten: 'Bulungan',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengolahan Pangan Berbahan Baku Produk Lokal Angkatan I',
      kabupaten: 'Bulungan',
      peserta: 32,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Pengolahan Pangan Berbahan Baku Produk Lokal Angkatan II',
      kabupaten: 'Bulungan',
      peserta: 31,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Fasiltas Legalitas Usaha',
      kabupaten: 'Bulungan',
      peserta: 114,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Fasilitasi HAKI',
      kabupaten: 'Bulungan',
      peserta: 7,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Menganyam (Peserta 5 Kabupaten/Kota)',
      kabupaten: 'Bulungan',
      peserta: 21,
      tahun: 2022
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Kewirausahaan Kemanan Pangan dan Laporan Keuangan Bagi UMKM di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Strategi Pemasaran, Pembukuan dan Laporan Keuangan Sederhana Bagi UMKM di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Kewirausahaan Bagi Wira Usaha Pemula di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 45,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) Bagi Koperasi di Kabupaten Bulungan',
      kabupaten: 'Bulungan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'BIMTEK 15 WUB IKM BORDIR TINGKAT LANJUTAN DI KABUPATEN BULUNGAN',
      kabupaten: 'Bulungan',
      peserta: 15,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Fasilitasi Izin Usaha',
      kabupaten: 'Bulungan',
      peserta: 9,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Sertifikasi Halal',
      kabupaten: 'Bulungan',
      peserta: 9,
      tahun: 2021
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'BIMTEK WUB IKM KERAJINAN UKIRAN KAYU DI KABUPATEN BULUNGAN DAN KABUPATEN TANA TIDUNG',
      kabupaten: 'Bulungan',
      peserta: 10,
      tahun: 2023
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Ekspor',
      kabupaten: 'Bulungan',
      peserta: 10,
      tahun: 2023
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan Manajemen Resiko 2',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '366',
      nama_kabupaten: 'Kabupaten Bulungan',
      nama: 'Pelatihan PKP (Penyuluh Keamanan Pangan) 2 Desa Tias',
      kabupaten: 'Bulungan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'FASILITASI HALAL (INDUSTRI)',
      kabupaten: 'Malinau',
      peserta: 5,
      tahun: 2016
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) untuk mendapatkan NIK dan Barcode (KOPERASI & UKM )',
      kabupaten: 'Malinau',
      peserta: 70,
      tahun: 2016
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Salon Kecantikan bagi Remaja /Anak Putus Sekolah',
      kabupaten: 'Malinau',
      peserta: 53,
      tahun: 2016
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Manajemen Keuangan dan Akutansi Koperasi',
      kabupaten: 'Malinau',
      peserta: 65,
      tahun: 2016
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan untuk Meningkatkan Produk Lokal dan Daya Saing bagi Koperasi dan Pelaku UMKM',
      kabupaten: 'Malinau',
      peserta: 30,
      tahun: 2017
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Fasilitasi Pelaku Usaha melalui Design Dispatch Service',
      kabupaten: 'Malinau',
      peserta: 1,
      tahun: 2017
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Akuntansi Koperasi',
      kabupaten: 'Malinau',
      peserta: 40,
      tahun: 2018
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Bimbingan Teknis 25 WUB IKM Buah Lokal Di Kabupaten Malinau',
      kabupaten: 'Malinau',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Pengembangan dan Pemasaran Produk Home Décor dan Handicraft untuk Ekspor',
      kabupaten: 'Malinau',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Fasilitasi Legalitas Usaha',
      kabupaten: 'Malinau',
      peserta: 1,
      tahun: 2021
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Fasilitasi HAKI',
      kabupaten: 'Malinau',
      peserta: 7,
      tahun: 2021
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'BIMTEK WUB IKM MEMBATIK TEKNIK PEWARNAAN DI KABUPATEN MALINAU(Peserta 5 Kab/Kota)',
      kabupaten: 'Malinau',
      peserta: 20,
      tahun: 2021
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Strategi Pemasaran, Pembukuan dan Laporan Keuangan bagi UMKM di Malinau',
      kabupaten: 'Malinau',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Manajemen Koperasi bagi Koperasi di Malinau',
      kabupaten: 'Malinau',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Fasilitasi Izin Usaha',
      kabupaten: 'Malinau',
      peserta: 5,
      tahun: 2022
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Sertifikat halal',
      kabupaten: 'Malinau',
      peserta: 5,
      tahun: 2022
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'BIMTEK 20 WUB IKM ANYAMAN DI KABUPATEN MALINAU',
      kabupaten: 'Malinau',
      peserta: 20,
      tahun: 2023
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Sosialisasi LBH 1',
      kabupaten: 'Malinau',
      peserta: 60,
      tahun: 2023
    },
    {
      id_kabupaten: '367',
      nama_kabupaten: 'Kabupaten Malinau',
      nama: 'Pelatihan Manajemen Pemasaran 2',
      kabupaten: 'Malinau',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Kemasan Makanan dan Minuman untuk Ekspor (Daglu)',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2016
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Kewirausahaan bagi Pemula (Koperasi & UKM )',
      kabupaten: 'Nunukan',
      peserta: 39,
      tahun: 2016
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Fasiltasi Halal',
      kabupaten: 'Nunukan',
      peserta: 7,
      tahun: 2016
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Budidaya Rumput Laut bagi Petani Rumput Laut di Daerah Pesisir',
      kabupaten: 'Nunukan',
      peserta: 50,
      tahun: 2016
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Diklat Ekspor Kontraktual dengan Balai Besar Pendidikan dan Pelatihan Ekspor Indonesia',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengawasan dan Pemantapan bagi Pengawas dan Pengurus Koperasi Angkatan II',
      kabupaten: 'Nunukan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) Angkatan III',
      kabupaten: 'Nunukan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengawasan dan Pemantapan bagi Pengawas dan Pengurus Koperasi Angkatan I',
      kabupaten: 'Nunukan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Fasilitasi Pelaku Usaha melalui Design Dispatch Service',
      kabupaten: 'Nunukan',
      peserta: 1,
      tahun: 2017
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT)',
      kabupaten: 'Nunukan',
      peserta: 70,
      tahun: 2018
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Anyaman Serat Alam Mensalong',
      kabupaten: 'Nunukan',
      peserta: 40,
      tahun: 2018
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pemberkasan Pendaftaran Sertifikat Merk',
      kabupaten: 'Nunukan',
      peserta: 40,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Manajemen Kewirausahaan Bagi Wirausaha Pemula [WUP]',
      kabupaten: 'Nunukan',
      peserta: 50,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Kewirausahaan Membatik bagi Wirausaha Pemula',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Perkoperasian',
      kabupaten: 'Nunukan',
      peserta: 75,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Kemasan Makanan dan Minuman untuk Ekspor',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Bimbingan Teknis 25 WUB IKM Olahan Kelapa Di Sebatik',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Bimbingan Teknis 25 WUB IKM Membatik (Tingkat Lanjutan) Di Kabupaten Nunukan',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2021
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Sosialisasi Perlindungan Konsumen dilaksanakan di Kecamatan Sebatik',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI MASKER KAIN BAGI 29 WIRAUSAHA IKM KONVEKSI YANG TERDAMPAK COVID 19 DI KABUPATEN NUNUKAN',
      kabupaten: 'Nunukan',
      peserta: 29,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'BIMBINGAN TEKNIS OLAHAN PRODUK BERBAHAN TEPUNG MOCAF BAGI 25 WIRAUSAHA IKM PANGAN YANG TERDAMPAK COVID 19 DI KABUPATEN NUNUKAN',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI PEMBUATAN TEMPAT CUCI TANGAN PORTABLE BAGI 20 WIRAUSAHA IKM PENGELASAN YANG TERDAMPAK COVID 19 DI KABUPATEN NUNUKAN',
      kabupaten: 'Nunukan',
      peserta: 20,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI BERBAHAN PISANG DAN UBI BAGI 25 WIRAUSAHA IKM PANGAN YANG TERDAMPAK COVID 19 DI KABUPATEN NUNUKAN',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Managemen Koperasi dan Pembukuan Koperasi di Kabupaten Nunukan',
      kabupaten: 'Nunukan',
      peserta: 75,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Teknik Pengembangan Strategi Desain Kemasan Dan Branding Produk UMKM di Sebatik Kabupaten Nunukan',
      kabupaten: 'Nunukan',
      peserta: 35,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Teknik Dan Pengembangan Pemasaran Secara Online (E-Commerce) di Sebatik Kabupaten Nunukan',
      kabupaten: 'Nunukan',
      peserta: 31,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Kewirausahaan Berbasis UKM Salon bagi Wirausaha Pemula (WP) di Seimenggaris',
      kabupaten: 'Nunukan',
      peserta: 50,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Kewirausahaan Berbasis UKM Salon bagi Wirausaha Pemula (WP) di Lumbis Ogong',
      kabupaten: 'Nunukan',
      peserta: 50,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD (Karang TARUNA)',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Pengelolaan Manajemen Koperasi/KUD',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Digitalisasi Koperasi Untuk Pengurus Koperasi',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Literasi Keuangan Bagi Usaha Mikro Dan Digital Marketing Angkatan II',
      kabupaten: 'Nunukan',
      peserta: 25,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Standarisasi Produk Pangan Angkatan III (Kewirausahaan Bagi Pelaku Usaha Penjamah Makanan)',
      kabupaten: 'Nunukan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Digitalisasi Koperasi Untuk Pengurus Koperasi Angkatan II',
      kabupaten: 'Nunukan',
      peserta: 30,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Ekspor',
      kabupaten: 'Nunukan',
      peserta: 56,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Fasiltas Legalitas Usaha',
      kabupaten: 'Nunukan',
      peserta: 54,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Fasilitasi HAKI',
      kabupaten: 'Nunukan',
      peserta: 7,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Bimtek Tenun Sutra',
      kabupaten: 'Nunukan',
      peserta: 20,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'PELATIHAN STANDARISASI PRODUK PANGAN ANGKATAN III',
      kabupaten: 'Nunukan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) bagi Koperasi di Nunukan',
      kabupaten: 'Nunukan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Kewirausahaan bagi Usaha Pemula di Nunukan',
      kabupaten: 'Nunukan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Fasilitasi Izin Usaha',
      kabupaten: 'Nunukan',
      peserta: 11,
      tahun: 2021
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Sertifikat halal',
      kabupaten: 'Nunukan',
      peserta: 7,
      tahun: 2021
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'BIMTEK 20 WUB IKM OLAHAN SINGKONG DI KABUPATEN NUNUKAN',
      kabupaten: 'Nunukan',
      peserta: 20,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Sosialisasi LBH 2',
      kabupaten: 'Nunukan',
      peserta: 60,
      tahun: 2023
    },
    {
      id_kabupaten: '368',
      nama_kabupaten: 'Kabupaten Nunukan',
      nama: 'Pelatihan Manajemen Resiko 1',
      kabupaten: 'Nunukan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Fasilitasi Halal',
      kabupaten: 'Tana Tidung',
      peserta: 6,
      tahun: 2016
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Anyaman Rotan',
      kabupaten: 'Tana Tidung',
      peserta: 50,
      tahun: 2016
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Perpajakan BagiUKM',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pemberkasan Pendaftaran Sertifikat Merk',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2017
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Manajemen Dan Pengelolaan Koperasi di Gedung Serbaguna SMA Ngeri 1',
      kabupaten: 'Tana Tidung',
      peserta: 50,
      tahun: 2017
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Peningkatan dan Pengawasan Koperasi di Gedung Bebokot',
      kabupaten: 'Tana Tidung',
      peserta: 50,
      tahun: 2017
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Pembukuan Koperasi dan Laporan Rapat Anggota Tahunan (RAT) Di Gedung IPHI Kemenag Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 50,
      tahun: 2017
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Kewirasuahaan Kerajinan Anyaman Rotan di Gedung Serbaguna SMA Ngeri 1 Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2017
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Managemen Koperasi dan Pembukuan Koperasi di Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Managemen Koperasi dan Pembukuan Koperasi di Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Pembuatan Makanan Berbahan Dasar Sumber Daya Alam (SDA) Lokal Di Salimbatu dan Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Teknik Pengembangan Strategi Desain Kemasan Dan Branding Produk UMKM di Sebatik Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 35,
      tahun: 2018
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Teknik Dan Pengembangan Pemasaran Secara Online (E-Commerce) di Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 31,
      tahun: 2018
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Literasi Keuangan Bagi Usaha Mikro Angkatan III dan Optimalisasi Marketplace Untuk Memasarkan Produk',
      kabupaten: 'Tana Tidung',
      peserta: 30,
      tahun: 2021
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Manajemen Partisipasi Anggota Koperasi Angkatan II',
      kabupaten: 'Tana Tidung',
      peserta: 25,
      tahun: 2021
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Fasilitasi Legaitas Usaha',
      kabupaten: 'Tana Tidung',
      peserta: 36,
      tahun: 2021
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Fasilitasi HAKI',
      kabupaten: 'Tana Tidung',
      peserta: 7,
      tahun: 2021
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Kewirausahaan Bagi UMKM di Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) Bagi Koperasi di Kabupaten Tana Tidung',
      kabupaten: 'Tana Tidung',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'BIMBINGAN TEKNIS 25 WUB IKM OLAHAN BUAH KELAPA',
      kabupaten: 'Tana Tidung',
      peserta: 25,
      tahun: 2022
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Fasilitasi Izin Usaha',
      kabupaten: 'Tana Tidung',
      peserta: 4,
      tahun: 2022
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Sertifikat Halal',
      kabupaten: 'Tana Tidung',
      peserta: 6,
      tahun: 2022
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'BIMTEK WUB IKM KERAJINAN UKIRAN KAYU DI KABUPATEN BULUNGAN DAN KABUPATEN TANA TIDUNG',
      kabupaten: 'Tana Tidung',
      peserta: 10,
      tahun: 2023
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Ekspor',
      kabupaten: 'Tana Tidung',
      peserta: 1,
      tahun: 2023
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Manajemen Keuangan',
      kabupaten: 'Tana Tidung',
      peserta: 33,
      tahun: 2023
    },
    {
      id_kabupaten: '369',
      nama_kabupaten: 'Kabupaten Tana Tidung',
      nama: 'Pelatihan Manajemen Pemasaran 3',
      kabupaten: 'Tana Tidung',
      peserta: 33,
      tahun: 2023
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'produk ekspor makanan dan minuman (daglu)',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Kewirausahan bagi pemula (umkm)',
      kabupaten: 'Tarakan',
      peserta: 35,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'PENYULUHAN TPL IKM /produksi',
      kabupaten: 'Tarakan',
      peserta: 77,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'FASILITASI HALAL / produksi',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Ekspor bagi pelaku Usaha Makan dan Minum',
      kabupaten: 'Tarakan',
      peserta: 8,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Fasilitasi Perdagangan Luar Negeri',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Rapat Anggota Tahunan (RAT) Angkatan III',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2016
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Fasilitasi Permasalahan Perdagangan Luar Negeri di Daerah',
      kabupaten: 'Tarakan',
      peserta: 70,
      tahun: 2017
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kemasan Produk Makanan dan Minuman untuk Ekspor',
      kabupaten: 'Tarakan',
      peserta: 56,
      tahun: 2017
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Bagaimana Memulai Ekspor',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kemasan Makanan dan Minuman untuk Ekspor',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kemasan',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Retail Koperasi',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sosialisasi Peningkatan Penggunaan Produk Dalam Negeri',
      kabupaten: 'Tarakan',
      peserta: 40,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sosialisasi dan Bimbingan Teknis Sertifikasi Merk',
      kabupaten: 'Tarakan',
      peserta: 80,
      tahun: 2018
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan Berbasis E-Commerce bagi Wirausaha Pemula (WUP)',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan Berbasis Tata Rias Salon bagi Wirausaha Pemula',
      kabupaten: 'Tarakan',
      peserta: 50,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan Membatik bagi Wirausaha Pemula [WUP] di Lapas Kelas 2A',
      kabupaten: 'Tarakan',
      peserta: 60,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan Olahan Makanan Berbahan Lokal bagi Wirausaha Pemula [WUP] di Lapas Kelas 2A',
      kabupaten: 'Tarakan',
      peserta: 60,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Bimbingan Teknis 20 WUB IKM Pengelasan Dan Sertifikasi Kompetensi SKKN',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sosialisasi SNI Bagi AMDK dan AMIU',
      kabupaten: 'Tarakan',
      peserta: 20,
      tahun: 2019
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sosialisasi Hak Atas Kekayaan Intelektual (Haki) (PESERTA 5 KABKOTA)',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI MASKER KAIN BAGI 25 WIRAUSAHA IKM KONVEKSI YANG TERDAMPAK COVID 19 DI KOTA TARAKAN',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI BAJU HAZMAT SUIT BAGI 25 WIRAUSAHA IKM KONVEKSI YANG TERDAMPAK COVID 19 DI KOTA TARAKAN',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'BIMBINGAN TEKNIS PRODUKSI PEMBUATAN TEMPAT CUCI TANGAN PORTABLE BAGI 20 WIRAUSAHA IKM PENGELASAN YANG TERDAMPAK COVID 19 DI KOTA TARAKAN',
      kabupaten: 'Tarakan',
      peserta: 20,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'BIMBINGAN TEKNIS 20 WUB IKM PENGELASAN DAN SERTIFIKASI KOMPETENSI SKKNI DI KOTA TARAKAN (20 ORANG)',
      kabupaten: 'Tarakan',
      peserta: 20,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'SERTIFIKASI HALAL 35 IKM DAN PEMBINAAN OVOP (5 KABUPATEN/KOTA)',
      kabupaten: 'Tarakan',
      peserta: 38,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan Berbasis UKM Olahan Pangan bagi Wirausaha Pemula (WP)',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Penyusunan Laporan Rat Bagi Pengurus Dan Badan Pengawas Koperasi Ukm Center Kota Tarakan',
      kabupaten: 'Tarakan',
      peserta: 80,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Teknik Dan Pengembangan Pemasaran Secara Online (E-Commerce)',
      kabupaten: 'Tarakan',
      peserta: 33,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Manajemen Perkoperasian',
      kabupaten: 'Tarakan',
      peserta: 120,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sosialisasi Hak Atas Kekayaan Intelektual (Haki) 5 Kabupaten/Kota',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2020
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Layanan Bantuan Hukum Bagi Pelaku UKM Angkatan IV',
      kabupaten: 'Tarakan',
      peserta: 40,
      tahun: 2022
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Ekspor bagi pelaku Usaha Makan dan Minum',
      kabupaten: 'Tarakan',
      peserta: 27,
      tahun: 2022
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Fasilitasi Legalitas Usaha',
      kabupaten: 'Tarakan',
      peserta: 161,
      tahun: 2022
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Fasiltiasi HAKI',
      kabupaten: 'Tarakan',
      peserta: 7,
      tahun: 2022
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Bimbingan Teknis Olahan Perikanan',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2022
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Kewirausahaan bagi Usaha Pemula di Tarakan',
      kabupaten: 'Tarakan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Perkoperasian Bagi Pengawas dan Pengurus Koperasi di Tarakan',
      kabupaten: 'Tarakan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Perpajakan dan Laporan Keuangan Sederhana Bagi UMKM Sektor Olahan Pangan di Tarakan',
      kabupaten: 'Tarakan',
      peserta: 40,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'BIMTEK 20 WUB IKM MEMBATIK TINGKAT LANJUTAN DI KOTA TARAKAN',
      kabupaten: 'Tarakan',
      peserta: 20,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Fasilitasi Izin Usaha',
      kabupaten: 'Tarakan',
      peserta: 44,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pendampingan puenyuluhan kepada pelaku IKM',
      kabupaten: 'Tarakan',
      peserta: 30,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Sertifikasi Halal',
      kabupaten: 'Tarakan',
      peserta: 8,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'PELAKU USAHA YANG TELAH MENGIKUTI PELATIHAN EKSPOR',
      kabupaten: 'Tarakan',
      peserta: 25,
      tahun: 2021
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'OLAHAN PRODUK PERIKANAN DI KOTA TARAKAN',
      kabupaten: 'Tarakan',
      peserta: 20,
      tahun: 2023
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Ekspor',
      kabupaten: 'Tarakan',
      peserta: 3,
      tahun: 2023
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Manajemen Pemasaran 1',
      kabupaten: 'Tarakan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan PKP (Pelatihan Keamanan Pangan 1',
      kabupaten: 'Tarakan',
      peserta: 35,
      tahun: 2023
    },
    {
      id_kabupaten: '370',
      nama_kabupaten: 'Kota Tarakan',
      nama: 'Pelatihan Vokasional (Salon)',
      kabupaten: 'Tarakan',
      peserta: 35,
      tahun: 2023
    }
  ];

  const filteredData =
    selectedKabupaten === 'all'
      ? pelatihanData
      : pelatihanData.filter(data => data.id_kabupaten === selectedKabupaten);

  return (
    <SatuDataLayout title="Pelatihan">
      <Head title="Pelatihan - SatuData" />
      <div className="bg-gray-100 h-screen overflow-hidden p-8">
        <div className="max-w-7xl mx-auto">
          <div className="grid grid-cols-5 gap-4">
            {/* Filter Section */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base">Filter Kabupaten</CardTitle>
              </CardHeader>
              <CardContent className="p-4">
                <div className="space-y-4">
                  <Select
                    value={selectedKabupaten}
                    onValueChange={setSelectedKabupaten}
                  >
                    <SelectTrigger>
                      <SelectValue placeholder="Pilih Kabupaten/Kota" />
                    </SelectTrigger>
                    <SelectContent>
                      <SelectItem value="all">Semua Kabupaten/Kota</SelectItem>
                      <SelectItem value="366">Kabupaten Bulungan</SelectItem>
                      <SelectItem value="367">Kabupaten Malinau</SelectItem>
                      <SelectItem value="368">Kabupaten Nunukan</SelectItem>
                      <SelectItem value="369">Kabupaten Tana Tidung</SelectItem>
                      <SelectItem value="370">Kota Tarakan</SelectItem>
                    </SelectContent>
                  </Select>
                  <Button className="w-full bg-blue-600 hover:bg-blue-700 text-white">
                    Search
                  </Button>
                </div>
              </CardContent>
            </Card>

            {/* Table Section */}
            <Card className="col-span-3 row-span-2">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Data Pelatihan
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div className="mt-4 h-[500px] overflow-auto">
                  <table className="min-w-full divide-y divide-gray-300">
                    <thead>
                      <tr>
                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Nama Pelatihan
                        </th>
                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Kabupaten
                        </th>
                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Jumlah Peserta
                        </th>
                        <th className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                          Tahun
                        </th>
                      </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-200 bg-white">
                      {filteredData.map((item, index) => (
                        <tr key={index}>
                          <td className="px-3 py-4 text-sm text-gray-900">
                            {item.nama}
                          </td>
                          <td className="px-3 py-4 text-sm text-gray-900">
                            {item.kabupaten}
                          </td>
                          <td className="px-3 py-4 text-sm text-gray-900">
                            {item.peserta}
                          </td>
                          <td className="px-3 py-4 text-sm text-gray-900">
                            {item.tahun}
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              </CardContent>
            </Card>

            {/* Map Section */}
            <Card className="col-span-2 row-span-1">
              <CardHeader>
                <CardTitle className="text-base text-center">
                  Peta Sebaran Pelatihan
                </CardTitle>
              </CardHeader>
              <CardContent>
                <div ref={mapRef} className="h-[300px]"></div>
              </CardContent>
            </Card>
          </div>
        </div>
      </div>
    </SatuDataLayout>
  );
}
