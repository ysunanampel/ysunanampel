<?php

use App\Models\Post;
use App\Models\Page;
use App\Models\Gallery;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. HALAMAN BERANDA (WELCOME)
Route::get('/', function () {
    // Ambil 6 berita terbaru yang sudah dipublikasikan
    $berita = Post::where('is_published', true)
                  ->latest()
                  ->take(6)
                  ->get();

    // Ambil 3 foto dari album galeri terbaru
    $latestAlbum = Gallery::latest()->first();
    $galleryPhotos = [];
    if ($latestAlbum && is_array($latestAlbum->images)) {
        $galleryPhotos = array_slice($latestAlbum->images, 0, 3);
    }

    // Pastikan file view kamu bernama welcome.blade.php
    return view('welcome_yayasan', compact('berita', 'galleryPhotos'));
});

// 2. DETAIL BERITA
Route::get('/berita/{slug}', function ($slug) {
    $item = Post::where('slug', $slug)->firstOrFail();
    return view('show_berita', compact('item'));
})->name('berita.show');

// Halaman Daftar Semua Berita
Route::get('/berita', function () {
    $semuaBerita = \App\Models\Post::where('is_published', true)
                  ->latest()
                  ->paginate(9); // Menampilkan 9 berita per halaman

    return view('index_berita', compact('semuaBerita'));
})->name('berita.index');

// 3. HALAMAN DINAMIS (Profil, Visi Misi, Prestasi dari Filament)
Route::get('/halaman/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->firstOrFail();
    return view('page_detail', compact('page'));
})->name('page.show');

// 4. GALERI KEGIATAN
Route::get('/galeri', function () {
    $albums = Gallery::latest()->get(); 
    return view('galeri', compact('albums'));
})->name('galeri.index');

// 5. PENDAFTARAN (PPDB)
Route::get('/daftar', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/daftar', [RegistrationController::class, 'store'])->name('registration.store');
Route::get('/pengumuman', [RegistrationController::class, 'announcement'])->name('registration.announcement');

// 6. RUTE TAMBAHAN (Jika ingin menggunakan view manual/statis)
Route::get('/profil/madin', function () { return view('profil.madin'); });
Route::get('/profil/tpq', function () { return view('profil.tpq'); });

//Route::get('/kontak', function () {
    return view('kontak');
//})->name('kontak');

