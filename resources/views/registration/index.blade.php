@extends('layouts.app')

@section('title', 'Pendaftaran Santri Baru')

@section('content')
<div class="container mx-auto py-10 px-4">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <h1 class="text-2xl font-bold text-center text-blue-800 mb-6">
            Formulir Pendaftaran Santri Baru
        </h1>

        {{-- Menampilkan Pesan Sukses --}}
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                {{ session('success') }}
            </div>
        @endif

        {{-- Menampilkan Error Validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('registration.store') }}" method="POST">
            @csrf 
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Lengkap</label>
                    <input type="text" name="student_name" value="{{ old('student_name') }}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama santri" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2 text-sm">NIK</label>
                    <input type="number" name="nik" value="{{ old('nik') }}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="16 digit NIK" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2 text-sm">Jenis Kelamin</label>
                    <select name="gender" class="w-full border rounded-lg px-3 py-2 outline-none" required>
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2 text-sm">Tanggal Lahir</label>
                    <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full border rounded-lg px-3 py-2 outline-none" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Nama Orang Tua / Wali</label>
                <input type="text" name="parent_name" value="{{ old('parent_name') }}" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none" placeholder="Nama ayah/ibu" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Alamat Lengkap</label>
                <textarea name="address" class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none" rows="3" required placeholder="Alamat lengkap rumah">{{ old('address') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2 text-sm">Program yang Dituju</label>
                <select name="program_type" class="w-full border rounded-lg px-3 py-2 text-blue-700 font-semibold outline-none" required>
                    <option value="">-- Pilih Program --</option>
                    <option value="ponpes" {{ old('program_type') == 'ponpes' ? 'selected' : '' }}>Pondok Pesantren</option>
                    <option value="madin" {{ old('program_type') == 'madin' ? 'selected' : '' }}>Madrasah Diniyah</option>
                    <option value="tpq" {{ old('program_type') == 'tpq' ? 'selected' : '' }}>TPQ</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl shadow-lg transition duration-300 transform hover:-translate-y-1">
                Kirim Pendaftaran Sekarang 🚀
            </button>
        </form>
    </div>
</div>
@endsection