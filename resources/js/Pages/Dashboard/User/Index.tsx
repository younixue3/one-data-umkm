import * as React from 'react';
import { Head, Link, router } from '@inertiajs/react';
import {
  CheckCircleIcon,
  ChevronDownIcon,
  EllipsisVerticalIcon,
  MinusCircle
} from 'lucide-react';
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
import { Button } from '@/Components/ui/button';
import Authenticated from '../../../Layouts/AuthenticatedLayout';

export type User = {
  id: number;
  name: string;
  email: string;
};

export default function User({ userss }: { userss: any }) {
  const data: User[] = userss;
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
  const [idUser, setIdUser] = useState(undefined);

  const columns: ColumnDef<User>[] = [
    {
      accessorKey: 'id',
      header: 'ID',
      cell: ({ row }) => <div className="capitalize">{row.getValue('id')}</div>
    },
    {
      accessorKey: 'name',
      header: 'Nama',
      cell: ({ row }) => (
        <div className="capitalize">{row.getValue('name')}</div>
      )
    },
    {
      accessorKey: 'email',
      header: 'Email',
      cell: ({ row }) => {
        return <div>{row.getValue('email')}</div>;
      }
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
                    href={route('dashboard.user.edit', row.getValue('id'))}
                  >
                    Ubah
                  </Link>
                </DropdownMenuItem>
                <DropdownMenuSeparator />
                <DropdownMenuItem
                  className={'cursor-pointer'}
                  onClick={() => {
                    setIsDeleteDialogOpen(true);
                    setIdUser(row.getValue('id'));
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
    router.delete(route('dashboard.user.destroy', idUser), {
      onSuccess: () => {
        setIsDeleteDialogOpen(false);
        setIdUser(undefined);
        toast({
          title: 'Berhasil!',
          description: 'User berhasil di hapus.'
        });
      },
      onError: err => {
        setIsDeleteDialogOpen(false);
        setIdUser(undefined);
        toast({
          variant: 'destructive',
          title: 'Gagal!',
          description: Errors(err)
        });
      }
    });
  };

  return (
    <Authenticated>
      <Head title="Buat User" />
      <AlertDialog open={isDeleteDialogOpen}>
        <AlertDialogContent>
          <AlertDialogHeader>
            <AlertDialogTitle>
              Apakah anda yakin data ini dihapus?
            </AlertDialogTitle>
            <AlertDialogDescription>
              Tindakan ini tidak dapat dibatalkan. Ini akan secara permanen
              menghapus user Anda dan menghilangkan data Anda dari server.
            </AlertDialogDescription>
          </AlertDialogHeader>
          <AlertDialogFooter>
            <AlertDialogCancel onClick={() => setIsDeleteDialogOpen(false)}>
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
          <Link href={route('dashboard.user.create')}>Buat User</Link>
        </Button>
        <div className="w-full">
          <div className="flex items-center py-4">
            <Input
              placeholder="Cari User"
              value={
                (table.getColumn('name')?.getFilterValue() as string) ?? ''
              }
              onChange={user =>
                table.getColumn('name')?.setFilterValue(user.target.value)
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
    </Authenticated>
  );
}
