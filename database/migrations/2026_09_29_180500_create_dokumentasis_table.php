<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('kategori', ['Kegiatan', 'Fasilitas', 'Acara', 'Lainnya'])->default('Kegiatan');
            $table->string('foto');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasis');
    }
};