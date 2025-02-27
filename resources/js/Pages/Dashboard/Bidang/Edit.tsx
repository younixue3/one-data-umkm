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
import { Resolver, useForm } from 'react-hook-form';
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
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';

interface Profil {
  id?: number;
  description?: string | null;
  image?: File | null;
  category?: string;
}

interface FormValues {
  description?: string | null;
  image: File | null;
  category: string;
}

export default function Edit({ profil }: { profil: Profil }) {
  const FormSchema = yup.object({
    image: yup.mixed().nullable(),
    description: yup.string().nullable(),
    category: yup.string().required('Category is required')
  });
  const form = useForm<FormValues>({
    resolver: yupResolver(FormSchema) as Resolver<FormValues>,
    defaultValues: {
      description: profil.description || '',
      image: profil.image,
      category: profil.category || ''
    }
  });

  useEffect(() => {
    form.setValue('description', profil.description);
  }, [profil, form]);

  const onSubmit = (data: FormValues) => {
    const payload = {
      ...data,
      _method: 'put',
      image: data.image instanceof File ? data.image : null
    };
    router.post(route('dashboard.profil.update', profil.id), payload, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Profil berhasil di ubah.'
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

  const imageChangedHandler = (event: React.ChangeEvent<HTMLInputElement>) => {
    const file = event.target.files?.[0];

    if (!file) return;

    const { type, size } = file;
    const allowedFileType = ['image/png', 'image/jpg', 'image/jpeg'];

    if (!allowedFileType.includes(type)) {
      form.setError('image', { message: 'Tipe file tidak diperbolehkan' });
      form.setValue('image', null);
      return;
    }

    if (size > 3000000) {
      form.setError('image', { message: 'File terlalu besar, maksimal 3MB' });
      form.setValue('image', null);
      return;
    }

    form.clearErrors('image');
    form.setValue('image', file);
  };

  return (
    <AuthenticatedLayout>
      <Head title="Profil" />
      <div className="p-6 sm:p-8">
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
            <div className="grid grid-cols-2 w-full gap-6">
              <FormField
                control={form.control}
                name="category"
                render={({ field }) => (
                  <FormItem>
                    <FormLabel>Kategori</FormLabel>
                    <Select
                      onValueChange={field.onChange}
                      defaultValue={field.value}
                    >
                      <FormControl>
                        <SelectTrigger>
                          <SelectValue placeholder="Pilih kategori" />
                        </SelectTrigger>
                      </FormControl>
                      <SelectContent>
                        <SelectItem value="visi-misi">Visi Misi</SelectItem>
                        <SelectItem value="profil">Profil</SelectItem>
                        <SelectItem value="tugas-pokok-fungsi">
                          Tugas Pokok & Fungsi
                        </SelectItem>
                      </SelectContent>
                    </Select>
                    <FormDescription>Pilih kategori berita.</FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
              <FormField
                control={form.control}
                name="description"
                render={({ field }) => (
                  <FormItem className="flex w-full flex-col col-span-2">
                    <FormLabel>Deskripsi</FormLabel>
                    <FormControl>
                      <CKEditor
                        onChange={(event, editor) => {
                          form.setValue('description', editor.getData());
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
                          licenseKey: '<YOUR_LICENSE_KEY>',
                          initialData: profil.description || ''
                        }}
                      />
                    </FormControl>
                    <FormDescription>
                      Masukkan isi konten profil.
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
                      <Input type="file" onChange={imageChangedHandler} />
                    </FormControl>
                    <FormDescription>Masukkan gambar profil.</FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
              {profil.image && (
                <div className="mt-4">
                  <p className="text-sm font-medium">Gambar Saat Ini:</p>
                  <img
                    src={`/storage/${profil.image}`}
                    alt="Profil"
                    className="mt-2 max-w-xs rounded-lg shadow-md"
                  />
                </div>
              )}
            </div>
            <Button type="submit">Submit</Button>
          </form>
        </Form>
      </div>
    </AuthenticatedLayout>
  );
}
