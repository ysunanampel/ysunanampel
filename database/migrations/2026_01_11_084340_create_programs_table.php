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
    Schema::create('programs', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama Lembaga
        $table->string('type'); // Madin, Ponpes, atau TPQ
        $table->string('head_of_institution'); // Nama Kepala Lembaga 👳‍♂️
        $table->text('description'); // Deskripsi/Profil
        $table->text('study_schedule'); // Jadwal Belajar ⏰
        $table->string('image')->nullable(); // Foto Lembaga
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
