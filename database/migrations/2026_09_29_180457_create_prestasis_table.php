<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->enum('tingkat', ['Kota/Kabupaten', 'Provinsi', 'Nasional', 'Internasional']);
            $table->string('peraih'); // Nama siswa / tim
            $table->date('tanggal_diraih');
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};