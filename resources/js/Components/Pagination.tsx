import { Button } from '@/Components/ui/button';

interface PaginationProps {
  totalItems: number;
  itemsPerPage: number;
  currentPage: number;
  onPageChange: (page: number) => void;
}

export const Pagination = ({
  totalItems,
  itemsPerPage,
  currentPage,
  onPageChange
}: PaginationProps) => {
  const totalPages = Math.ceil(totalItems / itemsPerPage);

  const handlePrevious = () => {
    if (currentPage > 1) {
      onPageChange(currentPage - 1);
    }
  };

  const handleNext = () => {
    if (currentPage < totalPages) {
      onPageChange(currentPage + 1);
    }
  };

  const handlePageClick = (page: number) => {
    onPageChange(page);
  };

  return (
    <div className="flex justify-center items-center space-x-2 mt-5">
      <Button
        size="sm"
        variant="outline"
        disabled={currentPage === 1}
        onClick={handlePrevious}
      >
        Previous
      </Button>

      {[...Array(totalPages)].map((_, index) => (
        <Button
          key={index}
          size="sm"
          variant={index + 1 === currentPage ? 'default' : 'outline'}
          onClick={() => handlePageClick(index + 1)}
        >
          {index + 1}
        </Button>
      ))}

      <Button
        size="sm"
        variant="outline"
        disabled={currentPage === totalPages}
        onClick={handleNext}
      >
        Next
      </Button>
    </div>
  );
};
