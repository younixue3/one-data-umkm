import { PropsWithChildren, ReactNode } from 'react';
import {
  ChevronDown,
  CircleUser,
  Factory,
  GalleryThumbnails,
  Home,
  Menu,
  Newspaper,
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
    <div className="grid min-h-screen w-full md:grid-cols-[220px_1fr] lg:grid-cols-[280px_1fr]">
      <div className="hidden border-r bg-muted/40 md:block">
        <div className="flex h-full max-h-screen flex-col gap-2">
          <div className="flex h-14 items-center border-b px-4 lg:h-[60px] lg:px-6">
            <Link href="/" className="flex items-center gap-2 font-semibold">
              <ApplicationLogo className="h-10 w-10 fill-current text-gray-500" />
              <span>Satu Data UKM</span>
            </Link>
          </div>
          <div className="flex-1">
            <nav className="grid items-start px-2 text-sm font-medium lg:px-4">
              <Link
                href={route('dashboard.index')}
                className="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
              >
                <Home className="h-4 w-4" />
                Dashboard
              </Link>
              <Link
                href="#"
                className="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
              >
                <Package className="h-4 w-4 mr-1" />
                Publikasi
              </Link>
              <Collapsible>
                <CollapsibleTrigger className="flex w-full items-center justify-between gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                  <div className="flex items-center gap-3">
                    <NewspaperIcon className="h-4 w-4 mr-1" />
                    Post
                  </div>
                  <ChevronDown className="h-4 w-4" />
                </CollapsibleTrigger>
                <CollapsibleContent className="px-4 py-2">
                  <div className="grid gap-2">
                    <Link
                      href="#"
                      className="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
                    >
                      <GalleryThumbnails className="h-4 w-4 mr-1" />
                      Gallery
                    </Link>
                    <Link
                      href={route('dashboard.news.index')}
                      className="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
                    >
                      <NewspaperIcon className="h-4 w-4 mr-1" />
                      News
                    </Link>
                  </div>
                </CollapsibleContent>
              </Collapsible>
              <Link
                href={route('dashboard.user.index')}
                className="flex items-center gap-3 rounded-lg px-3 py-2 text-muted-foreground transition-all hover:text-primary"
              >
                <Users className="h-4 w-4 mr-1" />
                Manajemen User
              </Link>
              <Collapsible>
                <CollapsibleTrigger className="flex w-full items-center justify-between gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                  <div className="flex items-center gap-3">
                    <Factory className="h-4 w-4 mr-1" />
                    Industri
                  </div>
                  <ChevronDown className="h-4 w-4" />
                </CollapsibleTrigger>
                <CollapsibleContent className="px-4 py-2">
                  <div className="grid gap-2">
                    <Link
                      href={route('dashboard.ikm.index')}
                      className="flex items-center gap-4 rounded-lg px-3 py-2 text-muted-foreground hover:text-foreground"
                    >
                      IKM
                    </Link>
                    <Link
                      href={route('dashboard.bigindustri.index')}
                      className="flex items-center gap-4 rounded-lg px-3 py-2 text-muted-foreground hover:text-foreground"
                    >
                      Big Industri
                    </Link>
                  </div>
                </CollapsibleContent>
              </Collapsible>
            </nav>
          </div>
        </div>
      </div>
      <div className="flex flex-col">
        <header className="flex h-14 items-center gap-4 border-b bg-muted/40 px-4 lg:h-[60px] lg:px-6">
          <Sheet>
            <SheetTrigger asChild>
              <Button
                variant="outline"
                size="icon"
                className="shrink-0 md:hidden"
              >
                <Menu className="h-5 w-5" />
                <span className="sr-only">Toggle navigation menu</span>
              </Button>
            </SheetTrigger>
            <SheetContent side="left" className="flex flex-col">
              <nav className="grid gap-2 p-4 py-6 text-lg font-medium">
                <Link
                  href="/"
                  className="flex items-center gap-2 text-lg w-full font-semibold"
                >
                  <img
                    alt="Logo Kota Samarinda"
                    src="/images/logo-kota-samarinda.png"
                    className="h-10 w-10"
                  />
                  <span className="text-black text-sm">SatuData UKM</span>
                </Link>
                <Link
                  href={route('dashboard.index')}
                  className="flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                  <Home className="h-5 w-5" />
                  Dashboard
                </Link>
                <Link
                  href="#"
                  className="flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                  <Package className="h-5 w-5" />
                  Publikasi
                </Link>
                <Link
                  href="#"
                  className="flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                  <Ticket className="h-5 w-5" />
                  Gallery
                </Link>
                <Link
                  href={route('dashboard.user.index')}
                  className="flex items-center gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground"
                >
                  <Users className="h-5 w-5" />
                  Manajemen User
                </Link>
                <Collapsible>
                  <CollapsibleTrigger className="flex w-full items-center justify-between gap-4 rounded-xl px-3 py-2 text-muted-foreground hover:text-foreground">
                    <div className="flex items-center gap-4">
                      <Factory className="h-5 w-5" />
                      <span>Industri</span>
                    </div>
                    <ChevronDown className="h-4 w-4" />
                  </CollapsibleTrigger>
                  <CollapsibleContent className="px-4 py-2">
                    <div className="grid gap-2">
                      <Link
                        href={route('dashboard.ikm.index')}
                        className="flex items-center gap-4 rounded-lg px-3 py-2 text-muted-foreground hover:text-foreground"
                      >
                        Industri Kecil Menengah
                      </Link>
                      <Link
                        href={route('dashboard.bigindustri.index')}
                        className="flex items-center gap-4 rounded-lg px-3 py-2 text-muted-foreground hover:text-foreground"
                      >
                        Industri Besar
                      </Link>
                    </div>
                  </CollapsibleContent>
                </Collapsible>
              </nav>
            </SheetContent>
          </Sheet>
          <div className="w-full flex-1">
            <form>
              <div className="relative">
                <Search className="absolute left-2.5 top-2.5 h-4 w-4 text-muted-foreground" />
                <Input
                  type="search"
                  placeholder="Search..."
                  className="w-full appearance-none bg-background pl-8 shadow-none md:w-2/3 lg:w-1/3"
                />
              </div>
            </form>
          </div>
          <DropdownMenu>
            <DropdownMenuTrigger asChild>
              <Button variant="secondary" size="icon" className="rounded-full">
                <CircleUser className="h-5 w-5" />
                <span className="sr-only">Toggle user menu</span>
              </Button>
            </DropdownMenuTrigger>
            <DropdownMenuContent align="end">
              <DropdownMenuLabel>
                <div className="font-bold">{auth.user.name}</div>
                <div className="text-xs text-muted-foreground">
                  {auth.user.email}
                </div>
              </DropdownMenuLabel>
              <DropdownMenuSeparator />
              <DropdownMenuItem>Settings</DropdownMenuItem>
              <DropdownMenuItem>Support</DropdownMenuItem>
              <DropdownMenuSeparator />
              <DropdownMenuItem asChild>
                <Link href={route('logout')} method="post" className="w-full">
                  Logout
                </Link>
              </DropdownMenuItem>
            </DropdownMenuContent>
          </DropdownMenu>
        </header>
        <main className="flex-1 p-6">{children}</main>
      </div>
      <Toaster />
    </div>
  );
}
