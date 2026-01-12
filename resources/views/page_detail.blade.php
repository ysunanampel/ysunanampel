@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4">

            <div class="flex flex-col lg:flex-row gap-8">

                <div class="w-full lg:w-2/3">
                    <div class="bg-white shadow-sm rounded-3xl overflow-hidden border border-gray-100">
                        @if ($page->image)
                            <img src="{{ asset('storage/' . $page->image) }}" class="w-full h-80 object-cover">
                        @endif

                        <div class="p-8 md:p-10">
                            <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-8 border-b pb-6">
                                {{ $page->title }}
                            </h1>

                            <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                                {!! $page->content !!}
                                <div class="mt-10 pt-6 border-t border-gray-100">
                                    <p class="text-sm font-semibold text-gray-500 mb-3 uppercase tracking-wider">Bagikan
                                        Informasi Ini:</p>
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode('Halo, lihat profil ' . $page->title . ' di Yayasan Sunan Ampel ini: ' . url()->current()) }}"
                                        target="_blank"
                                        class="inline-flex items-center px-6 py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-2xl transition shadow-lg shadow-green-100">
                                        <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L0 24l6.335-1.662c1.72.94 3.659 1.437 5.634 1.437h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                        </svg>
                                        Bagikan ke WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="/" class="text-blue-600 hover:underline font-medium">← Kembali ke Beranda</a>
                    </div>
                </div>

                <div class="w-full lg:w-1/3 space-y-8">

                    <div class="aspect-video rounded-2xl overflow-hidden bg-black">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/xel8ThqQnbA?rel=0"
                            title="Profil TPQ Sunan Ampel" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-gray-800 font-bold mb-6 border-b pb-2">Berita Terbaru</h3>
                        <div class="space-y-6">
                            @foreach (\App\Models\Post::latest()->take(3)->get() as $trending)
                                <a href="/berita/{{ $trending->slug }}" class="flex items-center gap-4 group">
                                    <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-gray-100">
                                        <img src="{{ asset('storage/' . ($trending->image ?? $trending->thumbnail)) }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                    </div>
                                    <div class="flex-1">
                                        <h4
                                            class="text-xs font-bold text-gray-800 group-hover:text-blue-600 line-clamp-2 leading-snug">
                                            {{ $trending->title }}
                                        </h4>
                                        <p class="text-[10px] text-gray-400 mt-1 uppercase">
                                            {{ $trending->created_at->format('d M Y') }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-blue-600 rounded-3xl p-8 text-white text-center shadow-lg shadow-blue-200">
                        <h4 class="font-bold text-lg mb-2">Pendaftaran Santri</h4>
                        <p class="text-blue-100 text-sm mb-6">Mari bergabung menjadi bagian dari keluarga besar kami.</p>
                        <a href="/daftar"
                            class="inline-block w-full py-3 bg-white text-blue-600 font-bold rounded-2xl">Daftar
                            Sekarang</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
