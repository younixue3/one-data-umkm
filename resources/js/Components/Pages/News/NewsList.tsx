import { Card, CardContent, CardFooter } from '@/Components/ui/card';
import { Button } from '@/Components/ui/button';
import { Each } from '@/helper/Each';
import { Tanggal } from '@/helper/Tanggal';
import { Calendar, CalendarDays } from 'lucide-react';

export const NewsList = ({ data }: any) => {
  return (
    <>
      <Each
        of={data || []}
        render={(item: any) => {
          return (
            <Card key={item} className="bg-white overflow-hidden">
              <div className="relative">
                <img
                  src={`storage/${item.image}`}
                  alt={`News ${item.title}`}
                  className="w-full h-56 sm:h-72 object-cover"
                />
                <div className="absolute flex h-full top-0 left-0 right-0 p-3 sm:p-4 bg-black/40 hover:bg-black/50 transition ease-in-out delay-150">
                  <div className="mt-auto">
                    <span className="bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">
                      Berita
                    </span>
                    <div className="mr-1">
                      <h3 className="text-white font-bold text-sm sm:text-2xl mb-1">
                        {item.title}
                      </h3>
                      <p className="text-white text-xs sm:text-sm font-bold flex gap-2">
                        <CalendarDays className="my-auto" />
                        <span className="my-auto">
                          {Tanggal(item.created_at)}
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </Card>
          );
        }}
      />
    </>
  );
};
