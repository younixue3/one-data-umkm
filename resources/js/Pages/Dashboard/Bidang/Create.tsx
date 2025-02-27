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
import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue
} from '@/Components/ui/select';

interface FormData {
  title: string;
  description: string;
  category:
    | 'perindustrian'
    | 'perdagangan dalam negeri'
    | 'perdagangan luar negeri'
    | 'koperasi';
  image: File | null;
}

export default function Create() {
  const FormSchema: any = yup.object({
    title: yup.string().required('Judul wajib diisi'),
    description: yup.string().required('Deskripsi wajib diisi'),
    category: yup
      .string()
      .oneOf([
        'perindustrian',
        'perdagangan dalam negeri',
        'perdagangan luar negeri',
        'koperasi'
      ])
      .required('Kategori wajib dipilih'),
    image: yup
      .mixed()
      .required('Gambar wajib diisi')
      .test('fileSize', 'Ukuran file maksimal 3MB', (value: any) => {
        if (!value) return false;
        return value.size <= 3000000;
      })
      .test('fileType', 'Format file harus PNG, JPG, atau JPEG', value => {
        if (!value) return false;
        return ['image/png', 'image/jpg', 'image/jpeg'].includes(value.type);
      })
  });

  const form = useForm<FormData>({
    resolver: yupResolver(FormSchema),
    defaultValues: {
      title: '',
      description: '',
      category: 'perindustrian',
      image: null
    }
  });

  const onSubmit = (data: FormData) => {
    const formData = new FormData();
    formData.append('title', data.title);
    formData.append('description', data.description);
    formData.append('category', data.category);
    if (data.image) {
      formData.append('image', data.image);
    }

    router.post(route('dashboard.bidang.store'), formData, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Bidang berhasil ditambahkan.'
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
      form.setError('image', {
        message: 'Format file harus PNG, JPG, atau JPEG'
      });
      return;
    }

    if (size > 3000000) {
      form.setError('image', { message: 'Ukuran file maksimal 3MB' });
      return;
    }

    form.clearErrors('image');
    form.setValue('image', file);
  };

  return (
    <AuthenticatedLayout>
      <Head title="Bidang" />
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
                      <Input placeholder="Masukkan judul bidang" {...field} />
                    </FormControl>
                    <FormDescription>Masukkan judul bidang.</FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
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
                        <SelectItem value="perindustrian">
                          Perindustrian
                        </SelectItem>
                        <SelectItem value="perdagangan dalam negeri">
                          Perdagangan Dalam Negeri
                        </SelectItem>
                        <SelectItem value="perdagangan luar negeri">
                          Perdagangan Luar Negeri
                        </SelectItem>
                        <SelectItem value="koperasi">Koperasi</SelectItem>
                      </SelectContent>
                    </Select>
                    <FormDescription>Pilih kategori bidang.</FormDescription>
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
                        onChange={(_, editor) => {
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
                          ]
                        }}
                      />
                    </FormControl>
                    <FormDescription>
                      Masukkan deskripsi bidang.
                    </FormDescription>
                    <FormMessage />
                  </FormItem>
                )}
              />
              <FormField
                control={form.control}
                name="image"
                render={({ field: { value, ...field } }) => (
                  <FormItem>
                    <FormLabel>Gambar</FormLabel>
                    <FormControl>
                      <Input
                        type="file"
                        accept="image/png,image/jpg,image/jpeg"
                        onChange={imageChangedHandler}
                        {...field}
                      />
                    </FormControl>
                    <FormDescription>Masukkan gambar bidang.</FormDescription>
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
