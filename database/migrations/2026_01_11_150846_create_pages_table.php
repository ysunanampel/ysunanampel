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
    Schema::create('pages', function (Blueprint $table) {
        $table->id();
        $table->string('title'); // Judul (Visi Misi, Prestasi, Profil Madin)
        $table->string('slug')->unique(); // Untuk URL (visi-misi, prestasi)
        $table->longText('content'); // Isi kontennya
        $table->string('image')->nullable(); // Foto pendukung (opsional)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
