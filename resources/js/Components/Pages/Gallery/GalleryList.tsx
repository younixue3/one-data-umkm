import { Each } from '@/helper/Each';

export const GalleryList = ({ data }: any) => {
  return (
    <>
      <Each
        of={data || []}
        render={(item: any) => {
          return (
            <div
              key={item.id}
              className="relative group overflow-hidden rounded-lg shadow-lg"
            >
              <img
                src={item.image}
                alt={item.title}
                className="w-full h-48 sm:h-64 object-cover transition-transform duration-300 group-hover:scale-110"
              />
              <div className="absolute inset-0 bg-black bg-opacity-60 flex flex-col items-start justify-end p-3 sm:p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <span className="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded mb-1 sm:mb-2">
                  {new Date(item.date).toLocaleDateString()}
                </span>
                <h3 className="text-white text-base sm:text-xl font-bold mb-1 sm:mb-2">
                  {item.title}
                </h3>
                <p className="text-white text-xs sm:text-sm">
                  Click to read more about this important update in our
                  department.
                </p>
              </div>
            </div>
          );
        }}
      />
    </>
  );
};
