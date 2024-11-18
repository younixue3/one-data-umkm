import { Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Button } from '@/Components/ui/button';
import { ArrowLeft } from 'lucide-react';
import { Link, router } from '@inertiajs/react';
import { IkmType } from '@/types/ikm-type';
import { Card, CardContent } from '@/Components/ui/card';
import { Input } from '@/Components/ui/input';
import { Checkbox } from '@/Components/ui/checkbox';
import { useForm } from 'react-hook-form';
import * as yup from 'yup';
import { yupResolver } from '@hookform/resolvers/yup';
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage
} from '@/Components/ui/form';

const schema = yup.object({
  nama_perusahaan: yup.string().required('Nama perusahaan wajib diisi'),
  nama_pemilik: yup.string().required('Nama pemilik wajib diisi'),
  email: yup.string().email('Email tidak valid').optional(),
  no_hp: yup.string().optional(),
  alamat: yup.string().required('Alamat wajib diisi'),
  tahun_data: yup.number().required('Tahun data wajib diisi'),
  tenaga_kerja_pria: yup.number().required('Tenaga kerja pria wajib diisi'),
  tenaga_kerja_wanita: yup.number().required('Tenaga kerja wanita wajib diisi'),
  nilai_investasi: yup.number().required('Nilai investasi wajib diisi'),
  nilai_kapasitas: yup.number().required('Nilai kapasitas wajib diisi'),
  status_aktif: yup.boolean()
});

type FormValues = yup.InferType<typeof schema>;

export default function Edit({ auth, ikm }: PageProps<{ ikm: IkmType }>) {
  const form = useForm<FormValues>({
    resolver: yupResolver(schema),
    defaultValues: {
      nama_perusahaan: ikm.nama_perusahaan,
      nama_pemilik: ikm.nama_pemilik,
      email: ikm.email || '',
      no_hp: ikm.no_hp || '',
      alamat: ikm.alamat,
      tahun_data: ikm.tahun_data,
      tenaga_kerja_pria: ikm.tenaga_kerja_pria,
      tenaga_kerja_wanita: ikm.tenaga_kerja_wanita,
      nilai_investasi: ikm.nilai_investasi,
      nilai_kapasitas: ikm.nilai_kapasitas,
      status_aktif: ikm.status_aktif
    }
  });

  function onSubmit(values: FormValues) {
    router.put(route('dashboard.ikm.update', ikm.id), values);
  }

  return (
    <AuthenticatedLayout>
      <Head title={`Edit IKM - ${ikm.nama_perusahaan}`} />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="mb-6">
            <Link href={route('dashboard.ikm.show', ikm.id)}>
              <Button variant="outline">
                <ArrowLeft className="w-4 h-4 mr-2" />
                Kembali
              </Button>
            </Link>
          </div>

          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6">
              <h3 className="text-lg font-medium mb-6">Edit IKM</h3>

              <Form {...form}>
                <form
                  onSubmit={form.handleSubmit(onSubmit)}
                  className="space-y-6"
                >
                  <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <Card>
                      <CardContent className="pt-6 space-y-4">
                        <FormField
                          control={form.control}
                          name="nama_perusahaan"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>Nama Perusahaan</FormLabel>
                              <FormControl>
                                <Input {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />

                        <FormField
                          control={form.control}
                          name="nama_pemilik"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>Nama Pemilik</FormLabel>
                              <FormControl>
                                <Input {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />

                        <FormField
                          control={form.control}
                          name="status_aktif"
                          render={({ field }) => (
                            <FormItem className="flex items-center space-x-2">
                              <FormControl>
                                <Checkbox
                                  checked={field.value}
                                  onCheckedChange={field.onChange}
                                />
                              </FormControl>
                              <FormLabel>Status Aktif</FormLabel>
                            </FormItem>
                          )}
                        />
                      </CardContent>
                    </Card>

                    <Card>
                      <CardContent className="pt-6 space-y-4">
                        <FormField
                          control={form.control}
                          name="email"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>Email</FormLabel>
                              <FormControl>
                                <Input type="email" {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />

                        <FormField
                          control={form.control}
                          name="no_hp"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>No. HP</FormLabel>
                              <FormControl>
                                <Input {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />

                        <FormField
                          control={form.control}
                          name="alamat"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>Alamat</FormLabel>
                              <FormControl>
                                <Input {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />
                      </CardContent>
                    </Card>

                    <Card className="md:col-span-2">
                      <CardContent className="pt-6 space-y-4">
                        <div className="grid grid-cols-2 md:grid-cols-4 gap-4">
                          <FormField
                            control={form.control}
                            name="tahun_data"
                            render={({ field }) => (
                              <FormItem>
                                <FormLabel>Tahun Data</FormLabel>
                                <FormControl>
                                  <Input type="number" {...field} />
                                </FormControl>
                                <FormMessage />
                              </FormItem>
                            )}
                          />

                          <FormField
                            control={form.control}
                            name="tenaga_kerja_pria"
                            render={({ field }) => (
                              <FormItem>
                                <FormLabel>Tenaga Kerja Pria</FormLabel>
                                <FormControl>
                                  <Input type="number" {...field} />
                                </FormControl>
                                <FormMessage />
                              </FormItem>
                            )}
                          />

                          <FormField
                            control={form.control}
                            name="tenaga_kerja_wanita"
                            render={({ field }) => (
                              <FormItem>
                                <FormLabel>Tenaga Kerja Wanita</FormLabel>
                                <FormControl>
                                  <Input type="number" {...field} />
                                </FormControl>
                                <FormMessage />
                              </FormItem>
                            )}
                          />

                          <FormField
                            control={form.control}
                            name="nilai_investasi"
                            render={({ field }) => (
                              <FormItem>
                                <FormLabel>Nilai Investasi</FormLabel>
                                <FormControl>
                                  <Input type="number" {...field} />
                                </FormControl>
                                <FormMessage />
                              </FormItem>
                            )}
                          />
                        </div>

                        <FormField
                          control={form.control}
                          name="nilai_kapasitas"
                          render={({ field }) => (
                            <FormItem>
                              <FormLabel>Nilai Kapasitas</FormLabel>
                              <FormControl>
                                <Input type="number" {...field} />
                              </FormControl>
                              <FormMessage />
                            </FormItem>
                          )}
                        />
                      </CardContent>
                    </Card>

                    <div className="md:col-span-2 flex justify-end">
                      <Button
                        type="submit"
                        disabled={form.formState.isSubmitting}
                      >
                        Simpan Perubahan
                      </Button>
                    </div>
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
