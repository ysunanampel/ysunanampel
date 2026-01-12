<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>@yield('title') - Yayasan Sunan Ampel</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <style>
        @media (max-width: 768px) {
            .text-responsive {
                font-size: clamp(0.875rem, 4vw, 1rem);
            }
            .container-padding {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .touch-target {
                min-height: 44px;
                min-width: 44px;
            }
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen text-gray-800">

<nav class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="container mx-auto px-4 sm:px-6 py-3 sm:py-4 flex justify-between items-center">
        <a href="/" class="text-xl sm:text-2xl font-bold text-blue-900 hover:text-blue-700 transition touch-target flex items-center">
            Sunan Ampel Semambung
        </a>

        <button onclick="toggleMenu()" class="md:hidden p-2 text-gray-600 touch-target" aria-label="Toggle menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="navIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <ul id="navMenu" class="hidden md:flex flex-col md:flex-row absolute md:relative top-full left-0 w-full md:w-auto bg-white md:bg-transparent shadow-lg md:shadow-none p-6 md:p-0 space-y-3 md:space-y-0 md:space-x-4 lg:space-x-6 text-gray-700 font-medium border-t md:border-none">
            <li>
                <a href="/" class="block py-3 md:py-2 hover:text-blue-600 transition text-responsive touch-target">Beranda</a>
            </li>
            <li>
                <a href="/berita" class="block py-3 md:py-2 hover:text-blue-600 transition text-responsive touch-target">Berita</a>
            </li>
            <li>
                <a href="/galeri" class="block py-3 md:py-2 hover:text-blue-600 transition text-responsive touch-target">Galeri</a>
            </li>
            <li class="mt-4 md:mt-0">
                <a href="/daftar" class="block md:inline-block px-5 py-3 md:py-2 bg-blue-600 text-white rounded-full text-center hover:bg-blue-700 transition shadow-md text-responsive touch-target">
                    Daftar
                </a>
            </li>
        </ul>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('navMenu');
        const icon = document.getElementById('navIcon');
        
        menu.classList.toggle('hidden');
        
        // Optional: Change menu icon
        if (menu.classList.contains('hidden')) {
            icon.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
        } else {
            icon.setAttribute('d', 'M6 18L18 6M6 6l12 12');
        }
    }
    
    // Close menu when clicking outside on mobile
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('navMenu');
        const button = document.querySelector('button[onclick="toggleMenu()"]');
        
        if (window.innerWidth < 768 && !menu.contains(event.target) && !button.contains(event.target)) {
            if (!menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
                document.getElementById('navIcon').setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
            }
        }
    });
</script>

<main class="grow container-padding">
    @yield('content')
</main>

<footer class="bg-blue-900 text-white pt-12 pb-8">
    <div class="container mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10 md:gap-12 mb-8 md:mb-12">
            
            <div>
                <h3 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Yayasan Sunan Ampel</h3>
                <p class="text-blue-100 leading-relaxed mb-4 sm:mb-6 text-sm sm:text-base">
                    Mencetak generasi qur'ani yang berakhlakul karimah, cerdas, dan mandiri melalui pendidikan Madin dan TPQ yang berkualitas.
                </p>
                <div class="flex space-x-3 sm:space-x-4">
                    <a href="#" class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition touch-target" aria-label="Facebook">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="bg-blue-800 p-2 rounded-full hover:bg-blue-700 transition touch-target" aria-label="Instagram">
                        <svg class="w-5 h-5 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4 sm:mb-6 border-b border-blue-800 pb-2 inline-block">Tautan Cepat</h4>
                <ul class="space-y-2 sm:space-y-4 text-blue-100">
                    <li><a href="/" class="hover:text-white transition text-sm sm:text-base block py-1 sm:py-0">Beranda</a></li>
                    <li><a href="/galeri" class="hover:text-white transition text-sm sm:text-base block py-1 sm:py-0">Galeri Kegiatan</a></li>
                    <li><a href="/daftar" class="hover:text-white transition text-sm sm:text-base block py-1 sm:py-0">Pendaftaran Santri</a></li>
                    <li><a href="/halaman/visi-misi" class="hover:text-white transition text-sm sm:text-base block py-1 sm:py-0">Visi & Misi</a></li>
                  
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-4 sm:mb-6 border-b border-blue-800 pb-2 inline-block">Kontak Kami</h4>
                <ul class="space-y-3 sm:space-y-4 text-blue-100">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-sm sm:text-base">Jl. Buk Kemanten Ds Capang Dsn Semambung,Purwodadi,Jawa Timur</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 mr-2 sm:mr-3 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span class="text-sm sm:text-base">+6285649507229</span>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-blue-800 mb-6 sm:mb-8">

        <div class="text-center text-blue-300 text-xs sm:text-sm">
            <p>&copy; {{ date('Y') }} Yayasan Sunan Ampel Semambung. Seluruh Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>



<script src="https://cdnjs.cloudflare.com/ajax/libs/fslightbox/3.4.1/index.min.js"></script>
</body>
</html>