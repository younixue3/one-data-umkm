import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, router } from '@inertiajs/react';
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/Components/ui/form';
import * as yup from 'yup';
import { useForm } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import { toast } from '@/hooks/use-toast';
import { Input } from '@/Components/ui/input';
import { Button } from '@/Components/ui/button';
import Errors from '@/helper/Errors';
import { CKEditor } from '@ckeditor/ckeditor5-react';
import {
  Bold,
  ClassicEditor,
  Essentials,
  Italic,
  Mention,
  Paragraph,
  Undo
} from 'ckeditor5';
import 'ckeditor5/ckeditor5.css';
import { useEffect } from 'react';

interface News {
  id?: number;
  title: string;
  content?: string | null;
  image?: any;
}

export default function Edit({ news }: { news: News }) {
  const FormSchema = yup.object({
    title: yup.string().required(),
    image: yup.mixed().nullable(),
    content: yup.string().nullable()
  });

  const form = useForm({
    resolver: yupResolver(FormSchema),
    values: news
  });

  useEffect(() => {
    form.setValue('content', news.content);
  }, [news]);

  const onSubmit = (data: News) => {
    const payload: any = {
      ...data,
      _method: 'put',
      image: typeof data.image == 'object' ? data.image : null
    };
    router.post(route('dashboard.news.update', news.id), payload, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'News berhasil di ubah.'
        });
        form.reset();
      },
      onError: err => {
        toast({
          variant: 'destructive',
          title: 'Gagal!',
          description: Errors(err)
        });
      }
    });
  };

  const imageChangedHandler = (news: any) => {
    const file = news.target.files?.[0];

    if (!file) return;

    const { type, size } = file;
    const allowedFileType = ['image/png', 'image/jpg', 'image/jpeg'];

    if (allowedFileType.includes(type)) {
      if (size > 3000000) {
        form.setError('image', { message: 'File terlalu besar, maksimal 3MB' });
        form.setValue('image', '');
        return;
      }
    } else {
      form.setError('image', { message: 'Tipe file tidak diperbolehkan' });
      form.setValue('image', '');
      return;
    }
    form.clearErrors('image');
    form.setValue('image', file);
  };

  return (
    <AuthenticatedLayout>
      <Head title="News" />
      <div className="p-6 sm:p-8">
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
            <div className="grid grid-cols-2 w-full gap-6">
              <FormField
                control={form.control}
                name="title"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel>Judul</FormLabel>
                    <FormControl>
                      <Input
                        placeholder="Contoh: Tempat Wisata Desa Budaya"
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>Masukkan judul berita.</FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
              <FormField
                control={form.control}
                name="content"
                render={() => (
                  <FormItem className="flex w-full flex-col col-span-2">
                    <FormLabel>Deskripsi</FormLabel>
                    <FormControl>
                      <CKEditor
                        onChange={(event, editor) => {
                          form.setValue('content', editor.getData());
                        }}
                        editor={ClassicEditor}
                        config={{
                          toolbar: {
                            items: ['undo', 'redo', '|', 'bold', 'italic']
                          },
                          plugins: [
                            Bold,
                            Essentials,
                            Italic,
                            Mention,
                            Paragraph,
                            Undo
                          ],
                          licenseKey: '<YOUR_LICENSE_KEY>'
                        }}
                      />
                      {/*<Textarea*/}
                      {/*  className="resize-none"*/}
                      {/*  placeholder="Contoh: Baju Dayak merupakan ..."*/}
                      {/*  {...field}*/}
                      {/*  value={field.value ?? ''}*/}
                      {/*/>*/}
                    </FormControl>
                    <FormDescription>
                      Masukkan isi konten berita.
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
              <FormField
                control={form.control}
                name="image"
                render={() => (
                  <FormItem>
                    <FormLabel>Gambar</FormLabel>
                    <FormControl>
                      <Input
                        type="file"
                        onChange={news => imageChangedHandler(news)}
                      />
                    </FormControl>
                    <FormDescription>Masukkan gambar news.</FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
            </div>
            <Button type="submit">Submit</Button>
          </form>
        </Form>
      </div>
    </AuthenticatedLayout>
  );
}
