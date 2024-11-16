import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, router } from '@inertiajs/react';
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/Components/ui/form';
import * as yup from 'yup';
import { useForm } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import { toast } from '@/hooks/use-toast';
import { Input } from '@/Components/ui/input';
import { Button } from '@/Components/ui/button';
import { Textarea } from '@/Components/ui/textarea';
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';
import Errors from '@/helper/Errors';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';

interface FormData {
  nama_perusahaan: string;
  nama_pemilik: string;
  alamat: string;
  kelurahan_id: string;
  kecamatan_id: string;
  kabupaten_id: string;
  provinsi_id: string;
  kontak_person?: string;
  no_hp?: string;
  email?: string;
  nomor_izin?: string;
  tahun_izin?: string;
  jenis_usaha_id: string;
  jenis_produk_id: string;
  tahun_data: string;
  tenaga_kerja_pria: string;
  tenaga_kerja_wanita: string;
  nilai_investasi: string;
  nilai_kapasitas: string;
  satuan_kapasitas: string;
  nilai_produksi: string;
  nilai_bahan_baku: string;
  status_ekspor: boolean;
  negara_tujuan_ekspor?: string;
  status_aktif: boolean;
  jenis_pembiayaan?: string;
}

interface CreateProps {
  provinsis: { id: number; nama: string }[];
  kabupatens: { id: number; nama: string }[];
  kecamatans: { id: number; nama: string }[];
  kelurahans: { id: number; nama: string }[];
  jenis_usahas: { id: number; nama: string }[];
  jenis_produks: { id: number; nama: string }[];
}

export default function Create({
  provinsis,
  kabupatens,
  kecamatans,
  kelurahans,
  jenis_usahas,
  jenis_produks
}: CreateProps) {
  const FormSchema = yup.object().shape({
    nama_perusahaan: yup.string().required('Nama perusahaan wajib diisi'),
    nama_pemilik: yup.string().required('Nama pemilik wajib diisi'),
    alamat: yup.string().required('Alamat wajib diisi'),
    kelurahan_id: yup.string().required('Kelurahan wajib dipilih'),
    kecamatan_id: yup.string().required('Kecamatan wajib dipilih'),
    kabupaten_id: yup.string().required('Kabupaten wajib dipilih'),
    provinsi_id: yup.string().required('Provinsi wajib dipilih'),
    kontak_person: yup.string().optional(),
    no_hp: yup.string().optional(),
    email: yup.string().email('Email tidak valid').optional(),
    nomor_izin: yup.string().optional(),
    tahun_izin: yup.string().optional(),
    jenis_usaha_id: yup.string().required('Jenis usaha wajib dipilih'),
    jenis_produk_id: yup.string().required('Jenis produk wajib dipilih'),
    tahun_data: yup.string().required('Tahun data wajib diisi'),
    tenaga_kerja_pria: yup
      .string()
      .required('Jumlah tenaga kerja pria wajib diisi'),
    tenaga_kerja_wanita: yup
      .string()
      .required('Jumlah tenaga kerja wanita wajib diisi'),
    nilai_investasi: yup.string().required('Nilai investasi wajib diisi'),
    nilai_kapasitas: yup.string().required('Nilai kapasitas wajib diisi'),
    satuan_kapasitas: yup.string().required('Satuan kapasitas wajib diisi'),
    nilai_produksi: yup.string().required('Nilai produksi wajib diisi'),
    nilai_bahan_baku: yup.string().required('Nilai bahan baku wajib diisi'),
    status_ekspor: yup.boolean().required(),
    negara_tujuan_ekspor: yup.string().optional(),
    status_aktif: yup.boolean().required(),
    jenis_pembiayaan: yup.string().optional()
  });

  const form = useForm<FormData>({
    resolver: yupResolver(FormSchema),
    defaultValues: {
      tahun_data: new Date().getFullYear().toString(),
      tenaga_kerja_pria: '0',
      tenaga_kerja_wanita: '0',
      nilai_investasi: '0',
      nilai_kapasitas: '0',
      nilai_produksi: '0',
      nilai_bahan_baku: '0',
      status_ekspor: false,
      status_aktif: true
    }
  });

  const onSubmit = (data: FormData) => {
    const payload = {
      ...data,
      tenaga_kerja_pria: parseInt(data.tenaga_kerja_pria),
      tenaga_kerja_wanita: parseInt(data.tenaga_kerja_wanita),
      nilai_investasi: parseFloat(data.nilai_investasi),
      nilai_kapasitas: parseFloat(data.nilai_kapasitas),
      nilai_produksi: parseFloat(data.nilai_produksi),
      nilai_bahan_baku: parseFloat(data.nilai_bahan_baku)
    };

    router.post(route('dashboard.ikm.store'), payload, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Data IKM berhasil ditambahkan.'
        });
        form.reset();
      },
      onError: err => {
        toast({
          variant: 'destructive',
          title: 'Gagal!',
          description: Errors(err)
        });
      }
    });
  };

  const formatCurrency = (value: string) => {
    const num = value.replace(/[^\d]/g, '');
    return new Intl.NumberFormat('id-ID').format(parseInt(num));
  };

  return (
    <AuthenticatedLayout>
      <Head title="Tambah IKM" />
      <div className="p-6 sm:p-8">
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
            <Card>
              <CardHeader>
                <CardTitle>Informasi Perusahaan</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
                  <FormField
                    control={form.control}
                    name="nama_perusahaan"
                    render={({ field }) => (
                      <FormItem>
                        <FormLabel>Nama Perusahaan</FormLabel>
                        <FormControl>
                          <Input
                            placeholder="Masukkan nama perusahaan"
                            {...field}
                          />
                        </FormControl>
                        <FormMessage />
                      </FormItem>
                    )}
                  />

                  <FormField
                    control={form.control}
                    name="nama_pemilik"
                    render={({ field }) => (
                      <FormItem>
                        <FormLabel>Nama Pemilik</FormLabel>
                        <FormControl>
                          <Input
                            placeholder="Masukkan nama pemilik"
                            {...field}
                          />
                        </FormControl>
                        <FormMessage />
                      </FormItem>
                    )}
                  />
                </div>

                <FormField
                  control={form.control}
                  name="alamat"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Alamat</FormLabel>
                      <FormControl>
                        <Textarea
                          placeholder="Masukkan alamat lengkap"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                  <FormField
                    control={form.control}
                    name="provinsi_id"
                    render={({ field }) => (
                      <FormItem>
                        <FormLabel>Provinsi</FormLabel>
                        <Select
                          onValueChange={field.onChange}
                          defaultValue={field.value}
                        >
                          <FormControl>
                            <SelectTrigger>
                              <SelectValue placeholder="Pilih Provinsi" />
                            </SelectTrigger>
                          </FormControl>
                          <SelectContent>
                            {provinsis.map(provinsi => (
                              <SelectItem
                                key={provinsi.id}
                                value={provinsi.id.toString()}
                              >
                                {provinsi.nama}
                              </SelectItem>
                            ))}
                          </SelectContent>
                        </Select>
                        <FormMessage />
                      </FormItem>
                    )}
                  />

                  {/* Similar FormFields for kabupaten, kecamatan, kelurahan */}
                </div>
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Informasi Kontak</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <FormField
                  control={form.control}
                  name="kontak_person"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Kontak Person</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan nama kontak" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="no_hp"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>No HP</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan nomor HP" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="email"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Email</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan email" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Informasi Izin</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <FormField
                  control={form.control}
                  name="nomor_izin"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nomor Izin</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan nomor izin" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="tahun_izin"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Tahun Izin</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan tahun izin" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Informasi Usaha</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <FormField
                  control={form.control}
                  name="jenis_usaha_id"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Jenis Usaha</FormLabel>
                      <Select
                        onValueChange={field.onChange}
                        defaultValue={field.value}
                      >
                        <FormControl>
                          <SelectTrigger>
                            <SelectValue placeholder="Pilih Jenis Usaha" />
                          </SelectTrigger>
                        </FormControl>
                        <SelectContent>
                          {jenis_usahas.map(jenis => (
                            <SelectItem
                              key={jenis.id}
                              value={jenis.id.toString()}
                            >
                              {jenis.nama}
                            </SelectItem>
                          ))}
                        </SelectContent>
                      </Select>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="jenis_produk_id"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Jenis Produk</FormLabel>
                      <Select
                        onValueChange={field.onChange}
                        defaultValue={field.value}
                      >
                        <FormControl>
                          <SelectTrigger>
                            <SelectValue placeholder="Pilih Jenis Produk" />
                          </SelectTrigger>
                        </FormControl>
                        <SelectContent>
                          {jenis_produks.map(jenis => (
                            <SelectItem
                              key={jenis.id}
                              value={jenis.id.toString()}
                            >
                              {jenis.nama}
                            </SelectItem>
                          ))}
                        </SelectContent>
                      </Select>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="tahun_data"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Tahun Data</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan tahun data" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Informasi Tenaga Kerja</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 gap-4">
                <FormField
                  control={form.control}
                  name="tenaga_kerja_pria"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Tenaga Kerja Pria</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="tenaga_kerja_wanita"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Tenaga Kerja Wanita</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Informasi Produksi</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <FormField
                  control={form.control}
                  name="nilai_investasi"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nilai Investasi</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="nilai_kapasitas"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nilai Kapasitas</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="satuan_kapasitas"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Satuan Kapasitas</FormLabel>
                      <FormControl>
                        <Input placeholder="Masukkan satuan" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="nilai_produksi"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nilai Produksi</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="nilai_bahan_baku"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nilai Bahan Baku</FormLabel>
                      <FormControl>
                        <Input type="number" placeholder="0" {...field} />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <Card className="mt-4">
              <CardHeader>
                <CardTitle>Status</CardTitle>
              </CardHeader>
              <CardContent className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <FormField
                  control={form.control}
                  name="status_ekspor"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Status Ekspor</FormLabel>
                      <Select onValueChange={field.onChange}>
                        <FormControl>
                          <SelectTrigger>
                            <SelectValue placeholder="Pilih Status Ekspor" />
                          </SelectTrigger>
                        </FormControl>
                        <SelectContent>
                          <SelectItem value="true">Ya</SelectItem>
                          <SelectItem value="false">Tidak</SelectItem>
                        </SelectContent>
                      </Select>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="negara_tujuan_ekspor"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Negara Tujuan Ekspor</FormLabel>
                      <FormControl>
                        <Input
                          placeholder="Masukkan negara tujuan"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="status_aktif"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Status Aktif</FormLabel>
                      <Select onValueChange={field.onChange}>
                        <FormControl>
                          <SelectTrigger>
                            <SelectValue placeholder="Pilih Status Aktif" />
                          </SelectTrigger>
                        </FormControl>
                        <SelectContent>
                          <SelectItem value="true">Aktif</SelectItem>
                          <SelectItem value="false">Tidak Aktif</SelectItem>
                        </SelectContent>
                      </Select>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="jenis_pembiayaan"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Jenis Pembiayaan</FormLabel>
                      <FormControl>
                        <Input
                          placeholder="Masukkan jenis pembiayaan"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <div className="flex justify-end gap-4">
              <Button
                type="button"
                variant="outline"
                onClick={() => window.history.back()}
              >
                Batal
              </Button>
              <Button type="submit">Simpan</Button>
            </div>
          </form>
        </Form>
      </div>
    </AuthenticatedLayout>
  );
}
