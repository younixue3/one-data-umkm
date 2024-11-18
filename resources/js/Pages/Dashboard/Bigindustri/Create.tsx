import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, router } from '@inertiajs/react';
import {
  Form,
  FormControl,
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
import { Textarea } from '@/Components/ui/textarea';
import Errors from '@/helper/Errors';
import { Card, CardContent, CardHeader, CardTitle } from '@/Components/ui/card';
import { BigindustriType } from '@/types/bigindustri-type';

export default function Create() {
  const FormSchema = yup.object().shape({
    nama_perusahaan: yup.string().required('Nama perusahaan wajib diisi'),
    alamat_pabrik: yup.string().required('Alamat wajib diisi'),
    sektor_industri: yup.string().required('Sektor industri wajib diisi')
  });

  const form = useForm<BigindustriType>({
    resolver: yupResolver(FormSchema),
    defaultValues: {}
  });

  const onSubmit = (data: BigindustriType) => {
    const payload = {
      nama_perusahaan: data.nama_perusahaan,
      alamat_pabrik: data.alamat_pabrik,
      sektor_industri: data.sektor_industri
    };
    router.post(route('dashboard.bigindustri.store'), payload, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Data Bigindustri berhasil ditambahkan.'
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

  return (
    <AuthenticatedLayout>
      <Head title="Tambah IKM" />
      <div className="p-6 sm:p-8">
        <Form {...form}>
          <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
            <Card>
              <CardHeader>
                <CardTitle>Informasi Perusahaan</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                <FormField
                  control={form.control}
                  name="nama_perusahaan"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Nama Perusahaan</FormLabel>
                      <FormControl>
                        <Input
                          placeholder="Masukkan nama perusahaan"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="alamat_pabrik"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Alamat</FormLabel>
                      <FormControl>
                        <Textarea
                          placeholder="Masukkan alamat lengkap"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />

                <FormField
                  control={form.control}
                  name="sektor_industri"
                  render={({ field }) => (
                    <FormItem>
                      <FormLabel>Sektor Industri</FormLabel>
                      <FormControl>
                        <Input
                          placeholder="Masukkan sektor industri"
                          {...field}
                        />
                      </FormControl>
                      <FormMessage />
                    </FormItem>
                  )}
                />
              </CardContent>
            </Card>

            <div className="flex justify-end gap-4">
              <Button
                type="button"
                variant="outline"
                onClick={() => window.history.back()}
              >
                Batal
              </Button>
              <Button type="submit">Simpan</Button>
            </div>
          </form>
        </Form>
      </div>
    </AuthenticatedLayout>
  );
}
