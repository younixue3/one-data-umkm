import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, router } from '@inertiajs/react';
import { Button } from '@/Components/ui/button';
import { Input } from '@/Components/ui/input';
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

export default function Edit({ users }: any) {
  const FormSchema = yup.object({
    id: yup.number().required(),
    name: yup.string().required('Nama wajib diisi.'),
    email: yup
      .string()
      .email('Email tidak valid.')
      .required('Email wajib diisi.'),
    password: yup
      .string()
      .nullable()
      .test(
        'min-length',
        'Password minimal 8 karakter.',
        value => !value || value.length >= 8
      ),
    password_confirmation: yup
      .string()
      .nullable()
      .test('passwords-match', 'Passwords harus sama', function (value) {
        return !this.parent.password || this.parent.password === value;
      })
  });
  console.log(users);
  const form = useForm({
    resolver: yupResolver(FormSchema),
    values: {
      ...users,
      password: '',
      password_confirmation: ''
    }
  });

  const onSubmit = (data: any) => {
    const formData = { ...data };
    if (!formData.password) {
      delete formData.password;
      delete formData.password_confirmation;
    }

    router.put(route('dashboard.user.update', users.id), formData, {
      onSuccess: () => {
        toast({
          variant: 'default',
          title: 'Berhasil!',
          description: 'Pengguna berhasil diubah.'
        });
        form.reset(formData);
      },
      onError: err => {
        console.log(err);
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
      <Head title="Edit Pengguna" />
      <div className="p-6 sm:p-8">
        <h1 className="text-xl font-semibold mb-6">Edit Pengguna</h1>
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
                    <Input type="password" placeholder="********" {...field} />
                  </FormControl>
                  <FormDescription>
                    Masukkan password baru (opsional).
                  </FormDescription>
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
                    <Input type="password" placeholder="********" {...field} />
                  </FormControl>
                  <FormDescription>
                    Konfirmasi password baru (jika diubah).
                  </FormDescription>
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
