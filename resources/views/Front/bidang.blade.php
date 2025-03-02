@extends('Front.master')
@section('title', 'Bidang')
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
            <div class="flex justify-between gap-8">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Program Kerja {{ isset($bidangs[0]) ? ucfirst($bidangs[0]->category) : 'Bidang' }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            Program Kerja Dinas Perindustrian dan Perdagangan bidang {{ isset($bidangs[0]) ? $bidangs[0]->category : 'terkait' }}.
                        </p>
                    </header>

                    <div class="mt-6 grid grid-cols-1 gap-6 sm:grid-cols-2">
                        @foreach($bidangs as $item)
                        <div class="overflow-hidden rounded-lg bg-white shadow">
                            <div class="p-4">
                                <img
                                    src="{{ $item->image }}"
                                    alt="{{ $item->title }}"
                                    class="w-full rounded-lg shadow-md"
                                />
                                <div class="mt-4 text-center">
                                    <h3 class="text-lg font-medium text-gray-900">
                                        {{ $item->title }}
                                    </h3>
                                    <p class="mt-2 text-sm text-gray-600">
                                        {{ $item->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="w-64">
                    <h2 class="text-lg font-medium text-gray-900 mb-4">
                        BIDANG LAINNYA
                    </h2>
                    <div class="space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">⚡</span>
                            <a
                                href="{{ route('bidang.index', 'perindustrian') }}"
                                class="text-gray-700 uppercase hover:text-blue-500"
                            >
                                PERINDUSTRIAN
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">⚡</span>
                            <a
                                href="{{ route('bidang.index', 'perdagangan-dalam-negeri') }}"
                                class="text-gray-700 uppercase hover:text-blue-500"
                            >
                                PERDAGANGAN DALAM NEGERI
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">⚡</span>
                            <a
                                href="{{ route('bidang.index', 'perdagangan-luar-negeri') }}"
                                class="text-gray-700 uppercase hover:text-blue-500"
                            >
                                PERDAGANGAN LUAR NEGERI
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-gray-500">⚡</span>
                            <a
                                href="{{ route('bidang.index', 'koperasi') }}"
                                class="text-gray-700 uppercase hover:text-blue-500"
                            >
                                KOPERASI
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection