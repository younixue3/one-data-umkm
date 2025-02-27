import Banner from '@/Components/Banner';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head } from '@inertiajs/react';

interface Props {
  profil: {
    id: number;
    category: 'visi-misi' | 'profil' | 'tugas-pokok-fungsi';
    description: string;
    image: string;
  };
}

export default function Index({ profil }: Props) {
  console.log(profil);
  return (
    <GuestLayout>
      <Head title="Profil" />

      <div>
        <Banner />
        <div className="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
          <div className="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div className="max-w-xl">
              <header>
                <h2 className="text-lg font-medium text-gray-900">
                  {profil.category === 'visi-misi' && 'Visi & Misi'}
                  {profil.category === 'profil' && 'Profil'}
                  {profil.category === 'tugas-pokok-fungsi' &&
                    'Tugas Pokok & Fungsi'}
                </h2>
                <p
                  className="mt-1 text-sm text-gray-600"
                  dangerouslySetInnerHTML={{ __html: profil.description }}
                ></p>
              </header>

              <div className="mt-6">
                <img
                  src={profil.image}
                  alt={`Gambar ${profil.category}`}
                  className="w-full rounded-lg shadow-md"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </GuestLayout>
  );
}
