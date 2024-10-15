import { Card, CardContent, CardFooter } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import { Each } from '@/helper/Each';
import { Link } from '@inertiajs/react';
import { Tanggal } from '@/helper/Tanggal';

export const NewsList = ({ data }: any) => {
  return (
    <>
      <Each
        of={data || []}
        render={(item: any) => {
          return (
            <Card
              key={item}
              className="bg-white border-blue-600 overflow-hidden"
            >
              <div className="relative">
                <img
                  src={`storage/${item.image}`}
                  alt={`News ${item.title}`}
                  className="w-full h-40 sm:h-48 object-cover"
                />
                <div className="absolute top-0 left-0 right-0 p-3 sm:p-4 bg-gradient-to-b from-black to-transparent">
                  <div className="flex justify-between items-start">
                    <div className="mr-1">
                      <h3 className="text-white font-bold text-sm sm:text-base mb-1">
                        {item.title}
                      </h3>
                      <p className="text-gray-300 text-xs sm:text-sm">
                        {Tanggal(item.created_at)}
                      </p>
                    </div>
                    <span className="bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">
                      Berita
                    </span>
                  </div>
                </div>
              </div>
              <CardContent>
                <p
                  className="mt-2 text-sm sm:text-base h-24 overflow-hidden leading-5"
                  dangerouslySetInnerHTML={{ __html: item.content }}
                ></p>
              </CardContent>
              <CardFooter>
                <Button className="w-full sm:w-auto bg-blue-600 hover:bg-blue-700">
                  Read More
                </Button>
              </CardFooter>
            </Card>
          );
        }}
      />
    </>
  );
};
