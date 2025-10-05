import { Head, Link, useForm, router } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import { Label } from '@/Components/ui/label';
import { Input } from '@/Components/ui/input';
import Checkbox from '@/Components/Checkbox';
import { Button } from '@/Components/ui/button';

export default function Login({
  status,
  canResetPassword
}: {
  status?: string;
  canResetPassword: boolean;
}) {
  const { data, setData, post, processing, errors, reset } = useForm({
    email: '',
    password: '',
    remember: false
  });

  const submit: FormEventHandler = e => {
    e.preventDefault();

    post(route('login'), {
      onFinish: () => reset('password')
    });
  };

  return (
    <>
      <Head title="Log in" />
      <div className="flex min-h-screen">
        {/* Section Gambar */}
        <div className="hidden md:flex w-1/2 bg-blue-600 justify-center items-center">
          <img
            src="~koperasi/images/login-illustration.svg"
            alt="Login Illustration"
            className="w-3/4 h-auto"
          />
        </div>

        {/* Section Form */}
        <div className="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8">
          <div className="max-w-md w-full space-y-6">
            <h2 className="text-2xl font-bold text-gray-900">
              Selamat Datang, Silakan Login
            </h2>

            {status && (
              <div className="mb-4 text-sm font-medium text-green-600">
                {status}
              </div>
            )}

            <form onSubmit={submit} className="space-y-4">
              {/* Input email */}
              <div>
                <Label htmlFor="email">Email</Label>
                <Input
                  id="email"
                  type="email"
                  value={data.email}
                  onChange={e => setData('email', e.target.value)}
                  className="mt-1 block w-full"
                  autoComplete="email"
                />
                {errors.email && (
                  <p className="mt-1 text-sm text-red-600">{errors.email}</p>
                )}
              </div>

              {/* Input Password */}
              <div>
                <Label htmlFor="password">Password</Label>
                <Input
                  id="password"
                  type="password"
                  value={data.password}
                  onChange={e => setData('password', e.target.value)}
                  className="mt-1 block w-full"
                  autoComplete="current-password"
                />
                {errors.password && (
                  <p className="mt-1 text-sm text-red-600">{errors.password}</p>
                )}
              </div>

              {/* Remember Me */}
              <div className="flex items-center justify-between">
                <label className="flex items-center">
                  <Checkbox
                    checked={data.remember}
                    onChange={(checked: any) => setData('remember', checked)}
                  />
                  <span className="ml-2 text-sm text-gray-600">Ingat saya</span>
                </label>

                {canResetPassword && (
                  <Link
                    href={route('password.request')}
                    className="text-sm text-blue-600 hover:underline"
                  >
                    Lupa Password?
                  </Link>
                )}
              </div>

              {/* Submit Button */}
              <Button type="submit" className="w-full" disabled={processing}>
                {processing ? 'Logging in...' : 'Log in'}
              </Button>
              <div className="mt-5">
                <Link
                  href={route('register')}
                  className="text-sm text-blue-600 hover:underline"
                >
                  Belum punya akun? Register
                </Link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </>
  );
}
