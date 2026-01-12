@extends('layouts.app')

@section('content')
<div class="bg-blue-900 py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold text-white mb-4">Berita & Kegiatan</h1>
        <p class="text-blue-100 max-w-2xl mx-auto">Ikuti terus perkembangan dan aktivitas terbaru dari keluarga besar Yayasan Sunan Ampel.</p>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($semuaBerita as $post)
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col">
                <div class="h-56 overflow-hidden">
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400 italic">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>

                <div class="p-6 flex-grow">
                    <div class="flex items-center text-sm text-gray-500 mb-3">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        {{ $post->created_at->format('d M Y') }}
                    </div>
                    <h2 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">
                        {{ $post->title }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                </div>

                <div class="px-6 pb-6 mt-auto">
                    <a href="{{ route('berita.show', $post->slug) }}" class="text-blue-600 font-bold text-sm flex items-center hover:text-blue-800">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" /></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-20">
                <p class="text-gray-500 text-lg">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-12">
        {{ $semuaBerita->links() }}
    </div>
</div>
@endsection