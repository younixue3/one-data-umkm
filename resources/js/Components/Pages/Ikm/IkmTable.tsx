import * as React from 'react';
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow
} from '@/Components/ui/table';
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
  useReactTable,
  getExpandedRowModel
} from '@tanstack/react-table';
import { IkmType } from '@/types/ikm-type';
import { useMemo, useState } from 'react';
import { Button } from '@/Components/ui/button';
import { ChevronDownIcon, ChevronRight } from 'lucide-react';
import { Input } from '@/Components/ui/input';
import {
  DropdownMenu,
  DropdownMenuCheckboxItem,
  DropdownMenuContent,
  DropdownMenuTrigger
} from '@/Components/ui/dropdown-menu';
import ActionButton from '@/Components/Pages/Ikm/Partials/ActionButton';

const columns: ColumnDef<IkmType>[] = [
  {
    accessorFn: (_, index) => index + 1,
    header: 'No'
  },
  {
    accessorKey: 'nama_perusahaan',
    header: 'Nama Perusahaan',
    cell: ({ row }) => {
      return (
        <div className="flex items-center">
          <Button
            variant="ghost"
            size="sm"
            onClick={() => row.toggleExpanded()}
            className="mr-2"
          >
            {row.getIsExpanded() ? (
              <ChevronDownIcon className="h-4 w-4" />
            ) : (
              <ChevronRight className="h-4 w-4" />
            )}
          </Button>
          {row.original.nama_perusahaan}
        </div>
      );
    }
  },
  {
    id: 'typeproducts',
    header: 'Jenis Produk',
    cell: ({ row }) => (
      <div>
        {row.original.typeproducts?.map((product: any) => (
          <div key={product.id}>{product.name}</div>
        ))}
      </div>
    )
  },
  {
    id: 'typeindustries',
    header: 'Jenis Industri',
    cell: ({ row }) => (
      <div>
        {row.original.typeindustries?.map((industry: any) => (
          <div key={industry.id}>{industry.name}</div>
        ))}
      </div>
    )
  },
  {
    id: 'location',
    header: 'Lokasi',
    cell: ({ row }) => (
      <div>
        <div>Provinsi: {row.original.provinsi?.name}</div>
        <div>Kabupaten: {row.original.kabupaten?.name}</div>
        <div>Kecamatan: {row.original.kecamatan?.name}</div>
        <div>Kelurahan: {row.original.kelurahan?.name}</div>
      </div>
    )
  },
  {
    accessorKey: 'status_aktif',
    header: 'Status',
    cell: ({ row }) => (
      <span
        className={`px-2 py-1 rounded-full text-xs bg-green-100 text-green-800`}
      >
        {row.original.status_aktif}
      </span>
    )
  },
  {
    id: 'actions',
    header: () => <div className="text-right">Aksi</div>,
    cell: ({ row }) => (
      <div className="text-right">
        <ActionButton ikm={row.original} />
      </div>
    )
  }
];

interface IkmTableProps {
  data: IkmType[];
}

export const IkmTable = ({ data }: IkmTableProps) => {
  const [sorting, setSorting] = useState<SortingState>([]);
  const [columnFilters, setColumnFilters] = useState<ColumnFiltersState>([]);
  const [columnVisibility, setColumnVisibility] = useState<VisibilityState>({});
  const [rowSelection, setRowSelection] = useState({});
  const [expanded, setExpanded] = useState({});

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
    onExpandedChange: setExpanded,
    getExpandedRowModel: getExpandedRowModel(),
    state: {
      sorting,
      columnFilters,
      columnVisibility,
      rowSelection,
      expanded
    },
    initialState: { pagination: { pageSize: 20 } }
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

  return (
    <div>
      <div className="flex items-center py-4">
        <Input
          placeholder="Filter nama perusahaan..."
          value={
            (table.getColumn('nama_perusahaan')?.getFilterValue() as string) ??
            ''
          }
          onChange={event =>
            table
              .getColumn('nama_perusahaan')
              ?.setFilterValue(event.target.value)
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
                    onCheckedChange={(value: boolean) =>
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
                {headerGroup.headers.map(header => (
                  <TableHead key={header.id}>
                    {header.isPlaceholder
                      ? null
                      : flexRender(
                          header.column.columnDef.header,
                          header.getContext()
                        )}
                  </TableHead>
                ))}
              </TableRow>
            ))}
          </TableHeader>
          <TableBody>
            {table.getRowModel().rows?.length ? (
              table.getRowModel().rows.map(row => (
                <>
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
                  {row.getIsExpanded() && (
                    <TableRow>
                      <TableCell colSpan={columns.length}>
                        <div className="p-4 bg-gray-50">
                          <div className="grid grid-cols-3 gap-4">
                            <div>
                              <h4 className="font-medium mb-2">Nama Pemilik</h4>
                              <p>{row.original.nama_pemilik}</p>
                            </div>
                            <div>
                              <h4 className="font-medium mb-2">Kontak</h4>
                              <p>No HP: {row.original.no_hp}</p>
                              <p>Email: {row.original.email}</p>
                            </div>
                            <div>
                              <h4 className="font-medium mb-2">Alamat</h4>
                              <p>{row.original.alamat}</p>
                            </div>
                          </div>
                        </div>
                      </TableCell>
                    </TableRow>
                  )}
                </>
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
  );
};
