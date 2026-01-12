@extends('layouts.app')

@section('title', 'Galeri Kegiatan')

@section('content')
<div class="bg-gray-50 min-h-screen py-12 md:py-20">
    <div class="container mx-auto px-4">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 mb-4">Galeri Kegiatan</h1>
            <p class="text-gray-600 leading-relaxed">Dokumentasi momen berharga dan aktivitas santri di Yayasan Sunan Ampel.</p>
            <div class="w-24 h-1.5 bg-blue-600 mx-auto mt-6 rounded-full"></div>
        </div>

        <div class="space-y-20">
            @foreach($albums as $album)
            <div class="bg-white rounded-[2rem] p-6 md:p-10 shadow-sm border border-gray-100">
                
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
                    <div class="max-w-xl">
                        <div class="flex items-center gap-2 text-blue-600 font-bold text-xs uppercase tracking-widest mb-2">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
                            Album Foto
                        </div>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $album->title }}</h2>
                        <p class="text-gray-500 mt-2 italic text-sm md:text-base">{{ $album->description }}</p>
                    </div>
                    <div class="text-gray-400 text-xs font-medium">
                        {{ count($album->images ?? []) }} Foto Tersedia
                    </div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                    @foreach($album->images as $img)
                    <a data-fslightbox="gallery-{{ $album->id }}" 
                       href="{{ asset('storage/' . $img) }}" 
                       class="group relative aspect-square overflow-hidden rounded-2xl shadow-sm hover:shadow-xl transition-all duration-500 block">
                        
                        <img src="{{ asset('storage/' . $img) }}" 
                             class="w-full h-full object-cover transform group-hover:scale-110 group-hover:rotate-2 transition duration-700"
                             loading="lazy">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex items-center justify-center">
                            <div class="bg-white/20 backdrop-blur-md p-3 rounded-full border border-white/30 transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
@endsection