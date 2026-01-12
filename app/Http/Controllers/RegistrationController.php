<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // 1. Menampilkan halaman formulir
    public function index()
    {
        return view('registration.index'); // Kita akan buat file ini nanti
    }

    // 2. Menyimpan data dari formulir ke database
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:registrations,nik',
            'gender' => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'parent_name' => 'required|string|max:255',
            'program_type' => 'required|in:ponpes,madin,tpq',
        ]);

        // Simpan ke database
        Registration::create($validated);

        // Beri pesan sukses dan kembali ke halaman sebelumnya
        return back()->with('success', 'Pendaftaran berhasil dikirim! Mohon tunggu konfirmasi admin.');
    }
    // Tambahkan fungsi ini di dalam class RegistrationController
public function announcement()
{
    // Mengambil data santri yang hanya berstatus 'approved'
    $registrations = Registration::where('status', 'approved')
        ->orderBy('student_name', 'asc') // Urutkan berdasarkan nama agar mudah dicari
        ->get();

    return view('registration.announcement', compact('registrations'));
}
}