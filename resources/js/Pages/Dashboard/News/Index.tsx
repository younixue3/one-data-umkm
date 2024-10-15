import * as React from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, Link, router } from '@inertiajs/react';
import { Button } from '@/Components/ui/button';
import { ChevronDownIcon, EllipsisVerticalIcon } from 'lucide-react';
import {
  DropdownMenu,
  DropdownMenuCheckboxItem,
  DropdownMenuContent,
  DropdownMenuItem,
  DropdownMenuLabel,
  DropdownMenuSeparator,
  DropdownMenuTrigger
} from '@/Components/ui/dropdown-menu';
import {
  ColumnDef,
  ColumnFiltersState,
  SortingState,
  VisibilityState,
  flexRender,
  getCoreRowModel,
  getFilteredRowModel,
  getPaginationRowModel,
  getSortedRowModel,
  useReactTable
} from '@tanstack/react-table';
import { Input } from '@/Components/ui/input';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow
} from '@/Components/ui/table';
import { Dialog, DialogContent, DialogTrigger } from '@/Components/ui/dialog';
import { toast } from '@/hooks/use-toast';
import Errors from '@/helper/Errors';
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle
} from '@/Components/ui/alert-dialog';
import { useMemo, useState } from 'react';

export type News = {
  id: string;
  title: string;
  content: string;
  image: any;
};

export default function News({ newss }: { newss: any }) {
  const data: News[] = newss;
  const [sorting, setSorting] = React.useState<SortingState>([
    {
      id: 'id',
      desc: false
    }
  ]);
  const [columnFilters, setColumnFilters] = React.useState<ColumnFiltersState>(
    []
  );
  const [columnVisibility, setColumnVisibility] =
    React.useState<VisibilityState>({});
  const [rowSelection, setRowSelection] = React.useState({});
  const [isDeleteDialogOpen, setIsDeleteDialogOpen] = useState(false);
  const [idNews, setIdNews] = useState(undefined);

  const columns: ColumnDef<News>[] = [
    {
      accessorKey: 'id',
      header: 'ID',
      cell: ({ row }) => <div className="capitalize">{row.getValue('id')}</div>
    },
    {
      accessorKey: 'title',
      header: 'Judul',
      cell: ({ row }) => (
        <div className="capitalize">{row.getValue('title')}</div>
      )
    },
    {
      accessorKey: 'content',
      header: 'Konten',
      cell: ({ row }) => (
        <div
          className={`capitalize w-[32rem] bg-gray-200 rounded-xl text-xs p-3 leading-5 ${row.getValue('content') ? '' : 'text-gray-400 italic'}`}
        >
          <div className="overflow-hidden max-h-24 hover:max-h-[15rem] h-full">
            {row.getValue('content') ? (
              <div
                dangerouslySetInnerHTML={{ __html: row.getValue('content') }}
              ></div>
            ) : (
              'Tidak Ada Konten'
            )}
          </div>
        </div>
      )
    },
    {
      accessorKey: 'image',
      header: 'Gambar',
      cell: ({ row }) => (
        <Dialog>
          <DialogTrigger asChild>
            <img
              alt={row.getValue('title')}
              className={'h-20 rounded-lg cursor-pointer'}
              src={'/storage/' + row.getValue('image')}
            />
          </DialogTrigger>
          <DialogContent className="p-10">
            <img
              alt={row.getValue('title')}
              className={'rounded-lg'}
              src={'/storage/' + row.getValue('image')}
            />
          </DialogContent>
        </Dialog>
      )
    },
    {
      id: 'actions',
      header: '#',
      enableHiding: false,
      cell: ({ row }) => {
        return (
          <div className="w-8">
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="ghost" className="h-8 w-8 p-0">
                  <span className="sr-only">Open menu</span>
                  <EllipsisVerticalIcon className="h-4 w-4" />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end">
                <DropdownMenuLabel>Actions</DropdownMenuLabel>
                <DropdownMenuItem>
                  <Link
                    className="w-full"
                    href={route('dashboard.news.edit', row.getValue('id'))}
                  >
                    Ubah
                  </Link>
                </DropdownMenuItem>
                <DropdownMenuSeparator />
                <DropdownMenuItem>
                  <Link
                    className="w-full"
                    href={route('dashboard.news.create')}
                  >
                    Lihat Artikel
                  </Link>
                </DropdownMenuItem>
                <DropdownMenuItem
                  className={'cursor-pointer'}
                  onClick={() => {
                    setIsDeleteDialogOpen(true);
                    setIdNews(row.getValue('id'));
                  }}
                >
                  Hapus
                </DropdownMenuItem>
              </DropdownMenuContent>
            </DropdownMenu>
          </div>
        );
      }
    }
  ];

  const table = useReactTable({
    data,
    columns,
    onSortingChange: setSorting,
    onColumnFiltersChange: setColumnFilters,
    getCoreRowModel: getCoreRowModel(),
    getPaginationRowModel: getPaginationRowModel(),
    getSortedRowModel: getSortedRowModel(),
    getFilteredRowModel: getFilteredRowModel(),
    onColumnVisibilityChange: setColumnVisibility,
    onRowSelectionChange: setRowSelection,
    state: {
      sorting,
      columnFilters,
      columnVisibility,
      rowSelection
    },
    initialState: { pagination: { pageSize: 5 } }
  });

  const { pageIndex } = table.getState().pagination;
  const pageCount = table.getPageCount();
  const pageRange = 2;

  const paginationRange = useMemo(() => {
    const startPage = Math.max(0, pageIndex - pageRange);
    const endPage = Math.min(pageCount - 1, pageIndex + pageRange);
    return Array.from(
      { length: endPage - startPage + 1 },
      (_, i) => startPage + i
    );
  }, [pageIndex, pageCount, pageRange]);

  const deleteItem = () => {
    router.delete(route('dashboard.news.destroy', idNews), {
      onSuccess: () => {
        setIsDeleteDialogOpen(false);
        setIdNews(undefined);
        toast({
          title: 'Berhasil!',
          description: 'News berhasil di hapus.'
        });
      },
      onError: err => {
        setIsDeleteDialogOpen(false);
        setIdNews(undefined);
        toast({
          variant: 'destructive',
          title: 'Gagal!',
          description: Errors(err)
        });
      }
    });
  };

  return (
    <AuthenticatedLayout>
      <Head title="Buat News" />
      <AlertDialog open={isDeleteDialogOpen}>
        <AlertDialogContent>
          <AlertDialogHeader>
            <AlertDialogTitle>
              Apakah anda yakin data ini dihapus?
            </AlertDialogTitle>
            <AlertDialogDescription>
              Tindakan ini tidak dapat dibatalkan. Ini akan secara permanen
              menghapus news Anda dan menghilangkan data Anda dari server.
            </AlertDialogDescription>
          </AlertDialogHeader>
          <AlertDialogFooter>
            <AlertDialogCancel
              onClick={() => setIsDeleteDialogOpen(false)}
            >
              Tidak
            </AlertDialogCancel>
            <AlertDialogAction
              onClick={() => {
                deleteItem();
              }}
            >
              Iya
            </AlertDialogAction>
          </AlertDialogFooter>
        </AlertDialogContent>
      </AlertDialog>
      <div>
        <Button asChild>
          <Link href={route('dashboard.news.create')}>Buat News</Link>
        </Button>
        <div className="w-full">
          <div className="flex items-center py-4">
            <Input
              placeholder="Cari News"
              value={
                (table.getColumn('title')?.getFilterValue() as string) ?? ''
              }
              onChange={news =>
                table.getColumn('title')?.setFilterValue(news.target.value)
              }
              className="max-w-sm"
            />
            <DropdownMenu>
              <DropdownMenuTrigger asChild>
                <Button variant="outline" className="ml-auto">
                  Columns <ChevronDownIcon className="ml-2 h-4 w-4" />
                </Button>
              </DropdownMenuTrigger>
              <DropdownMenuContent align="end">
                {table
                  .getAllColumns()
                  .filter(column => column.getCanHide())
                  .map(column => {
                    return (
                      <DropdownMenuCheckboxItem
                        key={column.id}
                        className="capitalize"
                        checked={column.getIsVisible()}
                        onCheckedChange={value =>
                          column.toggleVisibility(value)
                        }
                      >
                        {column.id}
                      </DropdownMenuCheckboxItem>
                    );
                  })}
              </DropdownMenuContent>
            </DropdownMenu>
          </div>
          <div className="rounded-md border">
            <Table>
              <TableHeader>
                {table.getHeaderGroups().map(headerGroup => (
                  <TableRow key={headerGroup.id}>
                    {headerGroup.headers.map(header => {
                      return (
                        <TableHead key={header.id}>
                          {header.isPlaceholder
                            ? null
                            : flexRender(
                                header.column.columnDef.header,
                                header.getContext()
                              )}
                        </TableHead>
                      );
                    })}
                  </TableRow>
                ))}
              </TableHeader>
              <TableBody>
                {table.getRowModel().rows?.length ? (
                  table.getRowModel().rows.map(row => (
                    <TableRow
                      key={row.id}
                      data-state={row.getIsSelected() && 'selected'}
                    >
                      {row.getVisibleCells().map(cell => (
                        <TableCell key={cell.id}>
                          {flexRender(
                            cell.column.columnDef.cell,
                            cell.getContext()
                          )}
                        </TableCell>
                      ))}
                    </TableRow>
                  ))
                ) : (
                  <TableRow>
                    <TableCell
                      colSpan={columns.length}
                      className="h-24 text-center"
                    >
                      No results.
                    </TableCell>
                  </TableRow>
                )}
              </TableBody>
            </Table>
          </div>
          <div className="flex items-center justify-end space-x-2 py-4">
            <div className="flex-1 text-sm text-muted-foreground">
              {table.getFilteredSelectedRowModel().rows.length} of{' '}
              {table.getFilteredRowModel().rows.length} row(s) selected.
            </div>
            <div className="space-x-2">
              <Button
                variant="outline"
                onClick={() => table.previousPage()}
                disabled={!table.getCanPreviousPage()}
              >
                Previous
              </Button>
              {paginationRange.map((pageNum: number) => (
                <Button
                  key={pageNum}
                  onClick={() => table.setPageIndex(pageNum)}
                  size="sm"
                  variant={pageNum === pageIndex ? 'default' : 'outline'}
                >
                  {pageNum + 1}
                </Button>
              ))}
              <Button
                variant="outline"
                onClick={() => table.nextPage()}
                disabled={!table.getCanNextPage()}
              >
                Next
              </Button>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
