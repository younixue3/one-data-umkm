import { PropsWithChildren, ReactNode } from 'react';
import {
  ChevronDown,
  CircleUser,
  Factory,
  Home,
  Menu,
  NewspaperIcon,
  Package,
  Search,
  Ticket,
  Users
} from 'lucide-react';
import { Button } from '../Components/ui/button';
import {
  DropdownMenu,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger
} from '../Components/ui/dropdown-menu';
import { Input } from '@/Components/ui/input';
import { Sheet, SheetContent, SheetTrigger } from '../Components/ui/sheet';
import { Link, usePage } from '@inertiajs/react';
import { Toaster } from '../Components/ui/toaster';
import ApplicationLogo from '../Components/ApplicationLogo';
import {
  Collapsible,
  CollapsibleContent,
  CollapsibleTrigger
} from '@/Components/ui/collapsible';

export default function Authenticated({
  children
}: PropsWithChildren<{ header?: ReactNode }>) {
  const { auth } = usePage().props as {
    auth: { user: { name: string; email: string } };
  };

  return (
    <div className="grid min-h-screen w-full md:grid-cols-[260px_1fr] lg:grid-cols-[300px_1fr] bg-gray-100">
      <div className="hidden h-screen border-r bg-blue-900 text-white md:block">
        <div className="flex h-full max-h-screen flex-col gap-2">
          <div className="flex h-16 items-center border-b border-blue-700 px-4 lg:h-[60px] lg:px-6">
            <Link href="/" className="flex items-center gap-2 font-semibold">
              <ApplicationLogo className="h-10 w-10 fill-current text-white" />
              <span className="text-lg">Satu Data UKM</span>
            </Link>
          </div>
          <div className="flex-1">
            <nav className="grid items-start px-4 text-sm font-medium">
              <Link
                href={route('dashboard.index')}
                className="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-all hover:bg-blue-700"
              >
                <Home className="h-5 w-5" />
                Dashboard
              </Link>
              <Link
                href="#"
                className="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-all hover:bg-blue-700"
              >
                <Package className="h-5 w-5" />
                Publikasi
              </Link>
              <Collapsible>
                <CollapsibleTrigger className="flex w-full items-center justify-between gap-4 rounded-lg px-3 py-2 text-white hover:bg-blue-700">
                  <div className="flex items-center gap-3">
                    <NewspaperIcon className="h-5 w-5" />
                    Post
                  </div>
                  <ChevronDown className="h-5 w-5" />
                </CollapsibleTrigger>
                <CollapsibleContent className="px-6 py-2 bg-blue-800 rounded-lg">
                  <div className="grid gap-2">
                    <Link
                      href={route('dashboard.news.index')}
                      className="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-all hover:bg-blue-700"
                    >
                      News
                    </Link>
                    <Link
                      href={route('dashboard.profil.index')}
                      className="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-all hover:bg-blue-700"
                    >
                      Profil
                    </Link>
                    <Link
                      href={route('dashboard.bidang.index')}
                      className="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-all hover:bg-blue-700"
                    >
                      Bidang
                    </Link>
                  </div>
                </CollapsibleContent>
              </Collapsible>
            </nav>
          </div>
        </div>
      </div>
      <div className="flex flex-col">
        <header className="flex h-16 items-center gap-4 border-b bg-white px-6 shadow-md">
          <Sheet>
            <SheetTrigger asChild>
              <Button variant="outline" size="icon" className="md:hidden">
                <Menu className="h-5 w-5" />
                <span className="sr-only">Toggle navigation menu</span>
              </Button>
            </SheetTrigger>
            <SheetContent side="left" className="flex flex-col">
              <nav className="grid gap-2 p-4 py-6 text-lg font-medium">
                <Link
                  href="/"
                  className="flex items-center gap-2 text-lg w-full font-semibold text-blue-900"
                >
                  <img
                    alt="Logo Kota Samarinda"
                    src="/images/logo-kota-samarinda.png"
                    className="h-10 w-10"
                  />
                  <span>SatuData UKM</span>
                </Link>
              </nav>
            </SheetContent>
          </Sheet>
          <div className="w-full flex-1">
            <form>
              <div className="relative">
                <Search className="absolute left-2.5 top-2.5 h-5 w-5 text-gray-500" />
                <Input
                  type="search"
                  placeholder="Search..."
                  className="w-full bg-gray-100 pl-10 shadow-none md:w-2/3 lg:w-1/3"
                />
              </div>
            </form>
          </div>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <Button
                variant="secondary"
                size="icon"
                className="rounded-full bg-blue-900 text-white"
              >
                <CircleUser className="h-5 w-5" />
                <span className="sr-only">Toggle user menu</span>
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
              <DropdownMenuLabel>
                <div className="font-bold text-gray-800">{auth.user.name}</div>
                <div className="text-xs text-gray-500">{auth.user.email}</div>
              </DropdownMenuLabel>
              <DropdownMenuSeparator />
              <DropdownMenuItem>Settings</DropdownMenuItem>
              <DropdownMenuItem>Support</DropdownMenuItem>
              <DropdownMenuSeparator />
              <DropdownMenuItem asChild>
                <Link
                  href={route('logout')}
                  method="post"
                  className="w-full text-red-500"
                >
                  Logout
                </Link>
              </DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </header>
        <main className="flex-1 p-6 bg-white shadow-sm rounded-lg">
          {children}
        </main>
      </div>
      <Toaster />
    </div>
  );
}
