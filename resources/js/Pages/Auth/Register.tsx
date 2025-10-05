import { Head, Link, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import { Label } from '@/Components/ui/label';
import { Input } from '@/Components/ui/input';
import { Button } from '@/Components/ui/button';

export default function Register() {
  const { data, setData, post, processing, errors, reset } = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
  });

  const submit: FormEventHandler = e => {
    e.preventDefault();

    post(route('register'), {
      onFinish: () => reset('password', 'password_confirmation')
    });
  };

  return (
    <>
      <Head title="Register" />
      <div className="flex min-h-screen">
        {/* Section Gambar */}
        <div className="hidden md:flex w-1/2 bg-blue-600 justify-center items-center">
          <img
            src="~koperasi/images/register-illustration.svg"
            alt="Register Illustration"
            className="w-3/4 h-auto"
          />
        </div>

        {/* Section Form */}
        <div className="w-full md:w-1/2 flex flex-col justify-center items-center bg-white p-8">
          <div className="max-w-md w-full space-y-6">
            <h2 className="text-2xl font-bold text-gray-900">Buat akun</h2>

            <form onSubmit={submit} className="space-y-4">
              {/* Input Name */}
              <div>
                <Label htmlFor="name">Name</Label>
                <Input
                  id="name"
                  type="text"
                  value={data.name}
                  onChange={e => setData('name', e.target.value)}
                  className="mt-1 block w-full"
                  autoComplete="name"
                  required
                />
                {errors.name && (
                  <p className="mt-1 text-sm text-red-600">{errors.name}</p>
                )}
              </div>

              {/* Input Email */}
              <div>
                <Label htmlFor="email">Email</Label>
                <Input
                  id="email"
                  type="email"
                  value={data.email}
                  onChange={e => setData('email', e.target.value)}
                  className="mt-1 block w-full"
                  autoComplete="email"
                  required
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
                  autoComplete="new-password"
                  required
                />
                {errors.password && (
                  <p className="mt-1 text-sm text-red-600">{errors.password}</p>
                )}
              </div>

              {/* Input Confirm Password */}
              <div>
                <Label htmlFor="password_confirmation">Confirm Password</Label>
                <Input
                  id="password_confirmation"
                  type="password"
                  value={data.password_confirmation}
                  onChange={e =>
                    setData('password_confirmation', e.target.value)
                  }
                  className="mt-1 block w-full"
                  autoComplete="new-password"
                  required
                />
                {errors.password_confirmation && (
                  <p className="mt-1 text-sm text-red-600">
                    {errors.password_confirmation}
                  </p>
                )}
              </div>

              {/* Submit Button */}
              <Button type="submit" className="w-full" disabled={processing}>
                {processing ? 'Registering...' : 'Register'}
              </Button>
              <div className="mt-5">
                <Link
                  href={route('login')}
                  className="text-sm text-blue-600 hover:underline"
                >
                  Sudah punya akun? Login
                </Link>
              </div>
            </form>
          </div>
        </div>
      </div>
    </>
  );
}
