import { PropsWithChildren } from 'react';
import { Link } from '@inertiajs/react';

interface SatuDataLayoutProps extends PropsWithChildren {
  title: string;
}

export default function SatuDataLayout({
  children,
  title
}: SatuDataLayoutProps) {
  const navItems = [
    { name: 'Industri', href: '/satu-data' },
    { name: 'Perdagangan', href: '/satu-data/perdagangan' },
    { name: 'Koperasi dan UKM', href: '/satu-data/koperasi-ukm' },
    { name: 'Pelatihan', href: '/satu-data/pelatihan' },
    { name: 'Pemetaan Pelatihan', href: '/satu-data/pemetaan-pelatihan' }
  ];

  return (
    <div className="min-h-screen bg-gray-100">
      <nav className="bg-white shadow-sm">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between h-16">
            <div className="flex">
              <div className="flex-shrink-0 flex items-center">
                <h1 className="text-xl font-bold">SatuData</h1>
              </div>
              <div className="hidden sm:ml-6 sm:flex sm:space-x-8">
                {navItems.map(item => (
                  <Link
                    key={item.href}
                    href={item.href}
                    className="inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium border-transparent hover:border-gray-300 text-gray-500 hover:text-gray-700"
                  >
                    {item.name}
                  </Link>
                ))}
              </div>
            </div>
          </div>
        </div>
      </nav>

      <main>
        <div className="max-w-7xl mx-auto">
          <div className="px-4 sm:px-0">{children}</div>
        </div>
      </main>
    </div>
  );
}
