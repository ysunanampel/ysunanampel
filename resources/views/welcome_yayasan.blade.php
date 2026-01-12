@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <header class="relative h-[550px] flex items-center bg-slate-900 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/background.jpg') }}" class="w-full h-full object-cover" alt="Background Sunan Ampel">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/90 via-blue-900/40 to-transparent"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-2xl text-left">
                <span class="inline-block px-4 py-1 bg-blue-500 text-white text-xs font-bold uppercase tracking-widest rounded-full mb-6">
                    Selamat Datang di Portal Resmi
                </span>
                <h1 class="text-4xl md:text-6xl font-black text-white leading-tight mb-6">
                    Yayasan <br>
                    <span class="text-blue-400">Sunan Ampel Semambung</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 mb-10 leading-relaxed">
                    Mencetak generasi Islami yang unggul dalam IPTEK, kokoh dalam IMTAK, dan berakhlakul karimah.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/daftar"
                       class="px-8 py-4 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-xl text-center">
                        Pendaftaran Santri
                    </a>
                    <a href="/berita"
                       class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/20 text-white font-bold rounded-xl hover:bg-white/20 transition text-center">
                        Lihat Kegiatan
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Program Pendidikan Section -->
    <section id="profil" class="py-12 sm:py-16 container mx-auto px-4 sm:px-6">
        <h2 class="text-2xl sm:text-3xl font-bold text-center text-gray-800 mb-8 sm:mb-10">
            Program Pendidikan Kami
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            <!-- Madin Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                <div class="p-6 sm:p-8 text-left">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-3">Madin</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
                        Pendidikan agama intensif untuk memperdalam kitab kuning dan akhlakul karimah.
                    </p>
                    <a href="/halaman/profil-madin"
                       class="inline-flex items-center text-blue-600 font-bold hover:text-blue-800 transition text-sm sm:text-base">
                        Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- TPQ Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                <div class="p-6 sm:p-8 text-left">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-green-100 text-green-600 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-3">TPQ</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
                        Fokus pada kelancaran membaca Al-Qur'an dengan metode tartil dan tahfidz juz amma.
                    </p>
                    <a href="/halaman/profil-tpq"
                       class="inline-flex items-center text-green-600 font-bold hover:text-green-800 transition text-sm sm:text-base">
                        Selengkapnya →
                    </a>
                </div>
            </div>

            <!-- Ponpes Card -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                <div class="p-6 sm:p-8 text-left">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-4 sm:mb-6">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2 sm:mb-3">Ponpes</h3>
                    <p class="text-gray-600 text-sm sm:text-base mb-4 sm:mb-6">
                        Pusat pembinaan karakter dan tempat mukim santri untuk mendalami ilmu agama secara kaffah.
                    </p>
                    <a href="/halaman/profil-pondok"
                       class="inline-flex items-center text-amber-600 font-bold hover:text-amber-800 transition text-sm sm:text-base">
                        Selengkapnya →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita & Kegiatan Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Berita Column -->
                <div class="lg:col-span-2">
                    <div class="flex justify-between items-center mb-8">
                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Berita & Kegiatan</h2>
                        <a href="/berita" class="text-blue-600 font-semibold hover:underline text-sm">
                            Lihat Semua →
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($berita as $item)
                            <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-300">
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" 
                                         class="w-full h-48 object-cover" 
                                         alt="{{ $item->title }}">
                                @else
                                    <div class="w-full h-48 bg-blue-50 flex items-center justify-center text-gray-400 italic text-sm">
                                        Tidak ada gambar
                                    </div>
                                @endif
                                <div class="p-5">
                                    <span class="text-green-600 text-xs font-bold uppercase tracking-widest">
                                        {{ $item->category ?? 'Berita' }}
                                    </span>
                                    <h3 class="text-lg font-bold mt-2 mb-3 text-gray-900 line-clamp-2 leading-snug">
                                        {{ $item->title }}
                                    </h3>
                                    <a href="/berita/{{ $item->slug }}"
                                       class="text-blue-600 font-bold text-sm hover:text-blue-800">
                                        Baca Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="col-span-2 text-center text-gray-500 py-10">
                                Belum ada berita terbaru.
                            </p>
                        @endforelse
                    </div>
                </div>

                <!-- Profile Column -->
                <div class="lg:col-span-1">
                    <!-- Ketua Yayasan Profile -->
                    <div class="flex flex-col items-center mb-8">
                        <div class="inline-block relative p-2 bg-white rounded-3xl shadow-xl border-2 border-blue-100 mb-6">
                            <div class="overflow-hidden rounded-2xl border-4 border-blue-900">
                                <img src="{{ asset('storage/gus.png') }}" 
                                     alt="Ketua Yayasan"
                                     class="w-48 h-64 md:w-56 md:h-72 object-cover">
                            </div>

                            <div class="absolute -bottom-2 -right-2 bg-blue-600 text-white p-2 rounded-lg shadow-lg">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                    <path fill-rule="evenodd"
                                          d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13zM7 13a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h.01a1 1 0 100-2H10zm3 0a1 1 0 000 2h.01a1 1 0 100-2H13z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="text-center mb-6">
                            <h3 class="text-xl font-bold text-blue-900 leading-tight">Gus Bahruddin Zakariya</h3>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-widest mt-1">
                                Ketua Yayasan Sunan Ampel
                            </p>
                        </div>

                        <div class="relative max-w-lg mx-auto">
                            <svg class="absolute -top-4 -left-4 w-10 h-10 text-blue-100 transform -scale-x-100"
                                 fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.851h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.154c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                            </svg>

                            <div class="bg-blue-50/50 p-6 rounded-2xl border-l-4 border-blue-600 italic text-gray-700 leading-relaxed text-center">
                                "Selamat datang di website resmi Yayasan Sunan Ampel. Melalui platform ini, kami berkomitmen
                                untuk memberikan informasi yang transparan dan memudahkan wali santri dalam memantau
                                perkembangan pendidikan putra-putrinya. Semoga menjadi berkah untuk kita semua."
                            </div>
                        </div>
                    </div>

                    <!-- Video Section -->
                    <div class="aspect-video rounded-2xl overflow-hidden bg-black shadow-lg">
                        <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/xel8ThqQnbA?rel=0"
                                title="Profil TPQ Sunan Ampel" 
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen 
                                referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Galeri Section -->
    <section class="py-12 sm:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-3xl font-bold mb-2">Galeri Kegiatan</h2>
                <p class="text-gray-600">Momen berharga di Yayasan Sunan Ampel</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($galleryPhotos as $photo)
                    <a data-fslightbox="gallery-home" 
                       href="{{ asset('storage/' . $photo) }}"
                       class="group relative h-64 overflow-hidden rounded-2xl shadow-lg block">
                        <img src="{{ asset('storage/' . $photo) }}"
                             class="w-full h-full object-cover transition duration-500 group-hover:scale-110"
                             alt="Galeri Kegiatan">
                        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                            <svg class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Lokasi & Kontak Section -->
    <section class="py-12 sm:py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">Lokasi & Kontak</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">
                <!-- Kontak Info -->
                <div class="space-y-6">
                    <!-- Alamat -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 flex items-start">
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center mr-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm sm:text-base">Alamat Lengkap</h4>
                            <p class="text-gray-600 text-sm">
                                Jl. Buk Kemanten, Semambung Lor, Capang, Kec. Purwodadi,
                                Pasuruan, Jawa Timur 67163
                            </p>
                        </div>
                    </div>

                    <!-- WhatsApp -->
                    <div class="bg-white p-6 rounded-2xl border border-gray-100 flex items-start">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-lg flex items-center justify-center mr-4 shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 text-sm sm:text-base">WhatsApp Admin</h4>
                            <p class="text-gray-600 text-sm">+6285649507229</p>
                        </div>
                    </div>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/6285649507229"
                       class="block w-full py-4 bg-green-500 text-white text-center font-bold rounded-2xl hover:bg-green-600 shadow-lg shadow-green-100 transition">
                        Chat WhatsApp Sekarang
                    </a>
                </div>

                <!-- Peta -->
                <div class="rounded-2xl overflow-hidden shadow-sm border border-gray-100 min-h-[300px]">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.123456789!2d112.7!3d-7.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDInMzIuNCJTIDExMsKwNDInMzIuNCJF!5e0!3m2!1sid!2sid!4v1234567890"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy"
                            title="Lokasi Yayasan Sunan Ampel">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6285649507229" 
       target="_blank"
       class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition z-50 flex items-center justify-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
        </svg>
    </a>
@endsection