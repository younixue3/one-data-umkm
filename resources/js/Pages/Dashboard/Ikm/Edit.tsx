import { Head, useForm } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { ArrowLeft } from 'lucide-react';
import { Link } from '@inertiajs/react';
import { IkmType } from '@/types/ikm-type';
import { Card, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Label } from '@/Components/ui/label';
import { Checkbox } from '@/Components/ui/checkbox';
import { FormEvent } from 'react';

export default function Edit({ auth, ikm }: PageProps<{ ikm: IkmType }>) {
  const { data, setData, put, processing, errors } = useForm({
    nama_perusahaan: ikm.nama_perusahaan,
    nama_pemilik: ikm.nama_pemilik,
    email: ikm.email,
    no_hp: ikm.no_hp,
    alamat: ikm.alamat,
    tahun_data: ikm.tahun_data,
    tenaga_kerja_pria: ikm.tenaga_kerja_pria,
    tenaga_kerja_wanita: ikm.tenaga_kerja_wanita,
    nilai_investasi: ikm.nilai_investasi,
    nilai_kapasitas: ikm.nilai_kapasitas,
    status_aktif: ikm.status_aktif
  });

  const handleSubmit = (e: FormEvent) => {
    e.preventDefault();
    put(route('dashboard.ikm.update', ikm.id));
  };

  return (
    <AuthenticatedLayout>
      <Head title={`Edit IKM - ${ikm.nama_perusahaan}`} />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="mb-6">
            <Link href={route('dashboard.ikm.show', ikm.id)}>
              <Button variant="outline">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Kembali
              </Button>
            </Link>
          </div>

          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <h3 className="text-lg font-medium mb-6">Edit IKM</h3>

              <form onSubmit={handleSubmit}>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <Card>
                    <CardContent className="pt-6 space-y-4">
                      <div className="space-y-2">
                        <Label htmlFor="nama_perusahaan">Nama Perusahaan</Label>
                        <Input
                          id="nama_perusahaan"
                          value={data.nama_perusahaan}
                          onChange={e =>
                            setData('nama_perusahaan', e.target.value)
                          }
                        />
                        {errors.nama_perusahaan && (
                          <p className="text-sm text-red-500">
                            {errors.nama_perusahaan}
                          </p>
                        )}
                      </div>

                      <div className="space-y-2">
                        <Label htmlFor="nama_pemilik">Nama Pemilik</Label>
                        <Input
                          id="nama_pemilik"
                          value={data.nama_pemilik}
                          onChange={e =>
                            setData('nama_pemilik', e.target.value)
                          }
                        />
                        {errors.nama_pemilik && (
                          <p className="text-sm text-red-500">
                            {errors.nama_pemilik}
                          </p>
                        )}
                      </div>

                      <div className="flex items-center space-x-2">
                        <Checkbox
                          id="status_aktif"
                          checked={data.status_aktif}
                          onCheckedChange={checked =>
                            setData('status_aktif', checked as boolean)
                          }
                        />
                        <Label htmlFor="status_aktif">Status Aktif</Label>
                      </div>
                    </CardContent>
                  </Card>

                  <Card>
                    <CardContent className="pt-6 space-y-4">
                      <div className="space-y-2">
                        <Label htmlFor="email">Email</Label>
                        <Input
                          id="email"
                          type="email"
                          value={data.email}
                          onChange={e => setData('email', e.target.value)}
                        />
                        {errors.email && (
                          <p className="text-sm text-red-500">{errors.email}</p>
                        )}
                      </div>

                      <div className="space-y-2">
                        <Label htmlFor="no_hp">No. HP</Label>
                        <Input
                          id="no_hp"
                          value={data.no_hp}
                          onChange={e => setData('no_hp', e.target.value)}
                        />
                        {errors.no_hp && (
                          <p className="text-sm text-red-500">{errors.no_hp}</p>
                        )}
                      </div>

                      <div className="space-y-2">
                        <Label htmlFor="alamat">Alamat</Label>
                        <Input
                          id="alamat"
                          value={data.alamat}
                          onChange={e => setData('alamat', e.target.value)}
                        />
                        {errors.alamat && (
                          <p className="text-sm text-red-500">
                            {errors.alamat}
                          </p>
                        )}
                      </div>
                    </CardContent>
                  </Card>

                  <Card className="md:col-span-2">
                    <CardContent className="pt-6 space-y-4">
                      <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div className="space-y-2">
                          <Label htmlFor="tahun_data">Tahun Data</Label>
                          <Input
                            id="tahun_data"
                            type="number"
                            value={data.tahun_data}
                            onChange={e =>
                              setData('tahun_data', e.target.value)
                            }
                          />
                          {errors.tahun_data && (
                            <p className="text-sm text-red-500">
                              {errors.tahun_data}
                            </p>
                          )}
                        </div>

                        <div className="space-y-2">
                          <Label htmlFor="tenaga_kerja_pria">
                            Tenaga Kerja Pria
                          </Label>
                          <Input
                            id="tenaga_kerja_pria"
                            type="number"
                            value={data.tenaga_kerja_pria}
                            onChange={e =>
                              setData('tenaga_kerja_pria', e.target.value)
                            }
                          />
                          {errors.tenaga_kerja_pria && (
                            <p className="text-sm text-red-500">
                              {errors.tenaga_kerja_pria}
                            </p>
                          )}
                        </div>

                        <div className="space-y-2">
                          <Label htmlFor="tenaga_kerja_wanita">
                            Tenaga Kerja Wanita
                          </Label>
                          <Input
                            id="tenaga_kerja_wanita"
                            type="number"
                            value={data.tenaga_kerja_wanita}
                            onChange={e =>
                              setData('tenaga_kerja_wanita', e.target.value)
                            }
                          />
                          {errors.tenaga_kerja_wanita && (
                            <p className="text-sm text-red-500">
                              {errors.tenaga_kerja_wanita}
                            </p>
                          )}
                        </div>

                        <div className="space-y-2">
                          <Label htmlFor="nilai_investasi">
                            Nilai Investasi
                          </Label>
                          <Input
                            id="nilai_investasi"
                            type="number"
                            value={data.nilai_investasi}
                            onChange={e =>
                              setData('nilai_investasi', e.target.value)
                            }
                          />
                          {errors.nilai_investasi && (
                            <p className="text-sm text-red-500">
                              {errors.nilai_investasi}
                            </p>
                          )}
                        </div>
                      </div>

                      <div className="space-y-2">
                        <Label htmlFor="nilai_kapasitas">Nilai Kapasitas</Label>
                        <Input
                          id="nilai_kapasitas"
                          type="number"
                          value={data.nilai_kapasitas}
                          onChange={e =>
                            setData('nilai_kapasitas', e.target.value)
                          }
                        />
                        {errors.nilai_kapasitas && (
                          <p className="text-sm text-red-500">
                            {errors.nilai_kapasitas}
                          </p>
                        )}
                      </div>
                    </CardContent>
                  </Card>

                  <div className="md:col-span-2 flex justify-end">
                    <Button type="submit" disabled={processing}>
                      Simpan Perubahan
                    </Button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
