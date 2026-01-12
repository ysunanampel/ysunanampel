@extends('layouts.app')

@section('title', 'Pengumuman Kelulusan')

@section('content')
<div class="container mx-auto py-12 px-4">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-extrabold text-blue-900 mb-3">
            🎉 Pengumuman Hasil Seleksi
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto italic">
            "Selamat bergabung bagi para santri baru di Yayasan Sunan Ampel. Semoga menjadi generasi yang sholeh dan bermanfaat."
        </p>
    </div>

    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-900 text-white">
                        <th class="p-4 text-center w-16">No</th>
                        <th class="p-4 text-left">Nama Lengkap</th>
                        <th class="p-4 text-center">Program</th>
                        <th class="p-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($registrations as $index => $reg)
                    <tr class="hover:bg-blue-50 transition-colors">
                        <td class="p-4 text-center text-gray-500 font-medium">
                            {{ $index + 1 }}
                        </td>
                        <td class="p-4">
                            <div class="font-bold text-gray-800 uppercase tracking-tight">
                                {{ $reg->student_name }}
                            </div>
                            <div class="text-xs text-gray-400 mt-1">
                                {{ $reg->address }}
                            </div>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold uppercase">
                                {{ $reg->program_type }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-bold shadow-sm inline-flex items-center gap-1">
                                <span>✔</span> LULUS
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-20 text-center">
                            <div class="text-gray-400 italic">
                                <div class="text-5xl mb-4">📂</div>
                                Belum ada data pengumuman saat ini.
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection