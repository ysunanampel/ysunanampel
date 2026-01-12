@extends('layouts.app')

@section('content')
<div class="bg-blue-900 py-16 text-center text-white">
    <h1 class="text-4xl font-bold mb-4">Hubungi Kami</h1>
    <p class="text-blue-100 px-4">Kami siap menjawab pertanyaan Anda seputar pendaftaran dan program pendidikan.</p>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>
                <form action="#" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">WhatsApp/Telepon</label>
                        <input type="tel" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
                    </div>
                    <button class="w-full py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition">Kirim Sekarang</button>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-blue-50 p-6 rounded-xl">
                    <p class="text-blue-600 font-bold">WhatsApp</p>
                    <p class="text-gray-700">+6285649507229</p>
                </div>
                <div class="bg-green-50 p-6 rounded-xl">
                    <p class="text-green-600 font-bold">Jam Operasional</p>
                    <p class="text-gray-700">09:00 - 20:00 (Jumat Tutup)</p>
                </div>
            </div>
        </div>

        <div class="h-full min-h-[400px]">
            <div class="bg-white p-2 rounded-2xl shadow-sm border border-gray-100 h-full">
                <iframe 
                    src="<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4035.3827420119874!2d112.72057131065374!3d-7.786856792200586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7d3c01708ec3f%3A0x27581077badddb37!2sYayasan%20sunan%20Ampel%20Semambung!5e1!3m2!1sid!2sid!4v1768196818622!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>" 
                    class="w-full h-full rounded-xl min-h-[450px]" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
                <div class="mt-4 p-4 text-sm text-gray-600">
                    <p class="font-bold text-gray-800">Alamat:</p>
                    <p>Jl. Buk Kemanten, Semambung Lor, Capang, Kec. Purwodadi, Pasuruan, Jawa Timur 67163</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection