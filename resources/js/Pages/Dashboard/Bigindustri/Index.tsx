import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { Plus } from 'lucide-react';
import { Link } from '@inertiajs/react';
import ImportExcel from '@/Components/Pages/Bigindustri/Partials/ImportExcel';
import { BigindustriType } from '@/types/bigindustri-type';
import { BigindustriTable } from '@/Components/Pages/Bigindustri/BigindustriTable';

export default function Index({
  bigindustris
}: PageProps<{ bigindustris: BigindustriType[] }>) {
  return (
    <AuthenticatedLayout>
      <Head title="Bigindustri" />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <div className="flex justify-between items-center mb-6">
                <h3 className="text-lg font-medium">Daftar Bigindustri</h3>
                <div className="flex gap-2">
                  <ImportExcel />
                  <Link href={route('dashboard.bigindustri.create')}>
                    <Button>
                      <Plus className="w-4 h-4 mr-2" />
                      Tambah Bigindustri
                    </Button>
                  </Link>
                </div>
              </div>

              <BigindustriTable data={bigindustris} />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
