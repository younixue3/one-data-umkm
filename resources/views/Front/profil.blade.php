@extends('Front.master')
@section('title', 'Profil')
@section('content')
<div>
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-full">
                <img
                    src="{{ asset('assets/banner2.png') }}"
                    alt="Banner"
                    class="w-full rounded-lg shadow-md"
                />
            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
        <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-xl">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        @if(isset($profil) && $profil->category === 'visi-misi')
                            Visi & Misi
                        @elseif(isset($profil) && $profil->category === 'profil')
                            Profil
                        @elseif(isset($profil) && $profil->category === 'tugas-pokok-fungsi')
                            Tugas Pokok & Fungsi
                        @else
                            Informasi
                        @endif
                    </h2>
                    <div class="mt-1 text-sm text-gray-600">
                        {!! isset($profil) ? $profil->description : 'Informasi tidak tersedia' !!}
                    </div>
                </header>

                <div class="mt-6">
                    <img
                        src="storage/{{ isset($profil) ? $profil->image : asset('assets/default.png') }}"
                        alt="Gambar {{ isset($profil) ? $profil->category : 'default' }}"
                        class="w-full rounded-lg shadow-md"
                    />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection