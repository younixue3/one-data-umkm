import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { Plus } from 'lucide-react';
import { Link } from '@inertiajs/react';
import { IkmType } from '@/types/ikm-type';
import ImportExcel from './Partials/ImportExcel';
import { IkmTable } from '@/Components/Pages/Ikm/IkmTable';

export default function Index({ auth, ikms }: PageProps<{ ikms: IkmType[] }>) {
  return (
    <AuthenticatedLayout>
      <Head title="IKM" />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <div className="flex justify-between items-center mb-6">
                <h3 className="text-lg font-medium">Daftar IKM</h3>
                <div className="flex gap-2">
                  <ImportExcel />
                  <Link href={route('dashboard.ikm.create')}>
                    <Button>
                      <Plus className="w-4 h-4 mr-2" />
                      Tambah IKM
                    </Button>
                  </Link>
                </div>
              </div>

              <IkmTable data={ikms} itemsPerPage={10} />
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
