<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('student_name'); // Nama Lengkap
        $table->string('nik')->unique(); // NIK
        $table->enum('gender', ['L', 'P']); // Laki-laki / Perempuan
        $table->date('birth_date'); // Tanggal Lahir
        $table->text('address'); // Alamat
        $table->string('parent_name'); // Nama Wali
        
        // Pilihan Program (Ini yang kamu usulkan tadi!)
        $table->string('program_type'); // Madin, Ponpes, atau TPQ
        
        // Status Pendaftaran
        $table->string('status')->default('pending'); // pending, approved, rejected
        
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
