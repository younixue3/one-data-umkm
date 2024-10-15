import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, router } from '@inertiajs/react';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
import { Checkbox } from '@/Components/ui/checkbox';
import * as yup from 'yup';
import { useForm } from 'react-hook-form';
import { yupResolver } from '@hookform/resolvers/yup';
import { toast } from '@/hooks/use-toast';
import {
  Form,
  FormControl,
  FormDescription,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/Components/ui/form';

export default function CreateUser() {
  const FormSchema = yup.object({
    name: yup.string().required('Nama wajib diisi.'),
    email: yup
      .string()
      .email('Email tidak valid.')
      .required('Email wajib diisi.'),
    password: yup
      .string()
      .min(6, 'Password minimal 6 karakter.')
      .required('Password wajib diisi.'),
    password_confirmation: yup
      .string()
      .oneOf(
        [yup.ref('password')],
        'Konfirmasi password harus sama dengan password.'
      )
      .required('Konfirmasi password wajib diisi.'),
    is_staff: yup.boolean().default(false)
  });

  const form = useForm({
    resolver: yupResolver(FormSchema),
    defaultValues: {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
      is_staff: false
    }
  });

  const onSubmit = (data: any) => {
    router.post(route('dashboard.user.store'), data, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Pengguna berhasil ditambahkan.'
        });
        form.reset();
      },
      onError: err => {
        toast({
          variant: 'destructive',
          title: 'Gagal!',
          description: `Terjadi kesalahan: ${err}`
        });
      }
    });
  };

  return (
    <AuthenticatedLayout>
      <Head title="Tambah Pengguna" />
      <div className="p-6 sm:p-8">
        <h1 className="text-xl font-semibold mb-6">Tambah Pengguna</h1>
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-6">
            <FormField
              control={form.control}
              name="name"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Nama</FormLabel>
                  <FormControl>
                    <Input placeholder="Contoh: Jane Doe" {...field} />
                  </FormControl>
                  <FormDescription>Masukkan nama user.</FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="email"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Email</FormLabel>
                  <FormControl>
                    <Input
                      type="email"
                      placeholder="Contoh: janedoe@gmail.com"
                      {...field}
                    />
                  </FormControl>
                  <FormDescription>Masukkan email user.</FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="password"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Password</FormLabel>
                  <FormControl>
                    <Input
                      type="password"
                      placeholder="Masukkan password"
                      {...field}
                    />
                  </FormControl>
                  <FormDescription>Masukkan password user.</FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
            <FormField
              control={form.control}
              name="password_confirmation"
              render={({ field }) => (
                <FormItem>
                  <FormLabel>Konfirmasi Password</FormLabel>
                  <FormControl>
                    <Input
                      type="password"
                      placeholder="Konfirmasi password"
                      {...field}
                    />
                  </FormControl>
                  <FormDescription>Konfirmasi password user.</FormDescription>
                  <FormMessage />
                </FormItem>
              )}
            />
            <Button type="submit">Submit</Button>
          </form>
        </Form>
      </div>
    </AuthenticatedLayout>
  );
}
