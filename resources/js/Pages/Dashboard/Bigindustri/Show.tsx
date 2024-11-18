import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { ArrowLeft, Edit } from 'lucide-react';
import { Link } from '@inertiajs/react';
import { BigindustriType } from '@/types/bigindustri-type';
import { Card, CardContent, CardHeader } from '@/Components/ui/card';

export default function Show({
  auth,
  bigindustri
}: PageProps<{ bigindustri: BigindustriType }>) {
  return (
    <AuthenticatedLayout>
      <Head title={`Detail Bigindustri - ${bigindustri.nama_perusahaan}`} />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="mb-6 flex justify-between items-center">
            <Link href={route('dashboard.bigindustri.index')}>
              <Button variant="outline">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Kembali
              </Button>
            </Link>
            <Link href={route('dashboard.bigindustri.edit', bigindustri.id)}>
              <Button>
                <Edit className="w-4 h-4 mr-2" />
                Edit Bigindustri
              </Button>
            </Link>
          </div>

          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <h3 className="text-lg font-medium mb-6">Detail Bigindustri</h3>

              <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                <Card>
                  <CardHeader className="font-semibold">
                    Informasi Perusahaan
                  </CardHeader>
                  <CardContent className="space-y-4">
                    <div>
                      <p className="text-sm text-gray-500">Nama Perusahaan</p>
                      <p>{bigindustri.nama_perusahaan}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Alamat Pabrik</p>
                      <p>{bigindustri.alamat_pabrik}</p>
                    </div>
                    <div>
                      <p className="text-sm text-gray-500">Sektor Industri</p>
                      <p>{bigindustri.sektor_industri}</p>
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
