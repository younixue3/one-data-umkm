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
import { PageProps } from '@/types';
import { ArrowLeft } from 'lucide-react';
import { Link } from '@inertiajs/react';

export default function Edit({
  bigindustri
}: PageProps<{ bigindustri: BigindustriType }>) {
  const FormSchema = yup.object().shape({
    nama_perusahaan: yup.string().required('Nama perusahaan wajib diisi'),
    alamat_pabrik: yup.string().required('Alamat wajib diisi'),
    sektor_industri: yup.string().required('Sektor industri wajib diisi')
  });

  const form = useForm<BigindustriType>({
    resolver: yupResolver(FormSchema),
    defaultValues: {
      nama_perusahaan: bigindustri.nama_perusahaan,
      alamat_pabrik: bigindustri.alamat_pabrik,
      sektor_industri: bigindustri.sektor_industri
    }
  });

  const onSubmit = (data: BigindustriType) => {
    const payload = {
      nama_perusahaan: data.nama_perusahaan,
      alamat_pabrik: data.alamat_pabrik,
      sektor_industri: data.sektor_industri
    };
    router.put(route('dashboard.bigindustri.update', bigindustri.id), payload, {
      onSuccess: () => {
        toast({
          title: 'Berhasil!',
          description: 'Data Bigindustri berhasil diperbarui.'
        });
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
      <Head title={`Edit Bigindustri - ${bigindustri.nama_perusahaan}`} />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="mb-6">
            <Link href={route('dashboard.bigindustri.show', bigindustri.id)}>
              <Button variant="outline">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Kembali
              </Button>
            </Link>
          </div>

          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <h3 className="text-lg font-medium mb-6">Edit Bigindustri</h3>

              <Form {...form}>
                <form
                  onSubmit={form.handleSubmit(onSubmit)}
                  className="space-y-8"
                >
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
                    <Button
                      type="submit"
                      disabled={form.formState.isSubmitting}
                    >
                      Simpan
                    </Button>
                  </div>
                </form>
              </Form>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
