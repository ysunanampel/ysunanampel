@extends('layouts.app')

@section('title', $item->title)

@section('content')
<div class="bg-gray-50 min-h-screen py-10 md:py-16">
    <div class="container mx-auto px-4">
        
        <div class="flex flex-col lg:flex-row gap-10">
            
            <div class="lg:w-2/3">
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100">
                    @if($item->thumbnail)
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                             class="w-full h-[300px] md:h-[450px] object-cover" 
                             alt="{{ $item->title }}">
                    @endif

                    <div class="p-6 md:p-10">
                        <header class="mb-8">
                            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                                {{ $item->title }}
                            </h1>
                            <div class="flex items-center text-gray-500 text-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Diterbitkan pada: {{ $item->created_at->format('d F Y') }}
                            </div>
                        </header>

                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! $item->content !!}
                        </div>

                        <div class="mt-12 pt-8 border-t border-gray-100">
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-5">Bagikan Berita Ini</p>
                            <div class="flex flex-wrap gap-3">
                                <a href="https://api.whatsapp.com/send?text={{ urlencode($item->title . ' - ' . url()->current()) }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#25D366] text-white rounded-2xl hover:scale-105 transition shadow-md">
                                    <span class="font-bold text-sm">WhatsApp</span>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="flex items-center gap-2 px-5 py-2.5 bg-[#1877F2] text-white rounded-2xl hover:scale-105 transition shadow-md">
                                    <span class="font-bold text-sm">Facebook</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="/berita" class="text-blue-600 flex items-center font-bold hover:underline">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        Kembali ke Daftar Berita
                    </a>
                </div>
            </div>

            <div class="lg:w-1/3 space-y-8">
                
                <div class="bg-gray-900 rounded-3xl p-5 shadow-xl border border-gray-800">
                    <h3 class="text-white font-bold mb-4 flex items-center text-xs uppercase tracking-widest">
                        <span class="w-2 h-2 bg-red-600 rounded-full mr-2 animate-pulse"></span>
                        Video Dokumentasi
                    </h3>
                    <div class="aspect-video rounded-2xl overflow-hidden bg-black shadow-inner">
                        <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/VIDEO_ID_KAMU" 
                                frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center border-b pb-3">
                        Berita Terbaru
                    </h3>
                    <div class="space-y-6">
                        {{-- Mengambil berita terbaru kecuali berita yang sedang dibaca --}}
                        @foreach(\App\Models\Post::where('id', '!=', $item->id)->latest()->take(3)->get() as $trending)
                        <a href="/berita/{{ $trending->slug }}" class="group flex items-start gap-4">
                            <div class="w-16 h-16 shrink-0 rounded-xl overflow-hidden bg-gray-100 border border-gray-50">
                                <img src="{{ asset('storage/' . $trending->thumbnail) }}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-blue-600 line-clamp-2 leading-tight">
                                    {{ $trending->title }}
                                </h4>
                                <span class="text-[10px] text-gray-400 mt-1 block italic uppercase">
                                    {{ $trending->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                    <a href="/berita" class="block w-full text-center mt-8 py-3 bg-blue-50 text-blue-700 rounded-2xl text-xs font-bold hover:bg-blue-100 transition">
                        Lihat Semua Berita
                    </a>
                </div>

                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-3xl p-8 text-white text-center shadow-lg">
                    <h4 class="font-bold text-xl mb-2">Ingin Bergabung?</h4>
                    <p class="text-blue-100 text-sm mb-6">Pendaftaran Santri Baru TPQ & Madin masih dibuka.</p>
                    <a href="/daftar" class="inline-block w-full py-3 bg-white text-blue-700 font-bold rounded-xl shadow-md hover:bg-gray-100 transition">
                        Daftar Sekarang
                    </a>
                </div>

            </div>
            </div>
    </div>
</div>
@endsection