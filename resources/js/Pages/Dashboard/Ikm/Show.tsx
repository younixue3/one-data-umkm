import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { ArrowLeft, Edit } from 'lucide-react';
import { Link } from '@inertiajs/react';
import { IkmType } from '@/types/ikm-type';
import { Card, CardContent, CardHeader } from '@/Components/ui/card';

export default function Show({ auth, ikm }: PageProps<{ ikm: IkmType }>) {
  return (
    <AuthenticatedLayout>
      <Head title={`Detail IKM - ${ikm.nama_perusahaan}`} />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="mb-6 flex justify-between items-center">
            <Link href={route('dashboard.ikm.index')}>
              <Button variant="outline">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Kembali
              </Button>
            </Link>
            <Link href={route('dashboard.ikm.edit', ikm.id)}>
              <Button>
                <Edit className="w-4 h-4 mr-2" />
                Edit IKM
              </Button>
            </Link>
          </div>

          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <h3 className="text-lg font-medium mb-6">Detail IKM</h3>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <Card>
                  <CardHeader className="font-semibold">
                    Informasi Perusahaan
                  </CardHeader>
                  <CardContent className="space-y-4">
                    <div>
                      <p className="text-sm text-gray-500">Nama Perusahaan</p>
                      <p>{ikm.nama_perusahaan}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Nama Pemilik</p>
                      <p>{ikm.nama_pemilik}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Status</p>
                      <span
                        className={`px-2 py-1 rounded-full text-xs ${
                          ikm.status_aktif
                            ? 'bg-green-100 text-green-800'
                            : 'bg-red-100 text-red-800'
                        }`}
                      >
                        {ikm.status_aktif ? 'Aktif' : 'Tidak Aktif'}
                      </span>
                    </div>
                  </CardContent>
                </Card>

                <Card>
                  <CardHeader className="font-semibold">
                    Kontak & Lokasi
                  </CardHeader>
                  <CardContent className="space-y-4">
                    <div>
                      <p className="text-sm text-gray-500">Email</p>
                      <p>{ikm.email}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">No. HP</p>
                      <p>{ikm.no_hp}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Alamat</p>
                      <p>{ikm.alamat}</p>
                    </div>
                  </CardContent>
                </Card>

                <Card className="md:col-span-2">
                  <CardHeader className="font-semibold">
                    Data Operasional
                  </CardHeader>
                  <CardContent className="space-y-4">
                    <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                      <div>
                        <p className="text-sm text-gray-500">Tahun Data</p>
                        <p>{ikm.tahun_data}</p>
                      </div>
                      <div>
                        <p className="text-sm text-gray-500">
                          Tenaga Kerja Pria
                        </p>
                        <p>{ikm.tenaga_kerja_pria}</p>
                      </div>
                      <div>
                        <p className="text-sm text-gray-500">
                          Tenaga Kerja Wanita
                        </p>
                        <p>{ikm.tenaga_kerja_wanita}</p>
                      </div>
                      <div>
                        <p className="text-sm text-gray-500">Nilai Investasi</p>
                        <p>Rp {Number(ikm.nilai_investasi).toLocaleString()}</p>
                      </div>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Nilai Kapasitas</p>
                      <p>Rp {Number(ikm.nilai_kapasitas).toLocaleString()}</p>
                    </div>
                  </CardContent>
                </Card>
              </div>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}