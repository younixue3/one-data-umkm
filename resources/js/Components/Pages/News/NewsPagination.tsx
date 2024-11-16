import { NewsList } from '@/Components/Pages/News/NewsList';
import { Pagination } from '@/Components/Pagination';
import { useState } from 'react';

interface News {
  id: string;
  title: string;
  content: string;
}

interface DataPaginationProps {
  data: News[];
  itemsPerPage: number;
}

export const NewsPagination = ({ data, itemsPerPage }: DataPaginationProps) => {
  const [currentPage, setCurrentPage] = useState(1);

  // Menghitung total halaman
  const totalItems = data.length;
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  // Memotong data sesuai halaman saat ini
  const paginatedData = data.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage
  );

  // Fungsi untuk mengganti halaman
  const handlePageChange = (page: number) => {
    setCurrentPage(page);
  };

  return (
    <div>
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <NewsList data={paginatedData} />
      </div>

      {/* Komponen Pagination */}
      <Pagination
        totalItems={totalItems}
        itemsPerPage={itemsPerPage}
        currentPage={currentPage}
        onPageChange={handlePageChange}
      />

      {/* Informasi halaman saat ini */}
      <p className="text-center text-sm mt-3">
        Page {currentPage} of {totalPages}
      </p>
    </div>
  );
};
