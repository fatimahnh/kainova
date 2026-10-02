<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // 2. Produk / Katalog
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori_produks')->onDelete('cascade');
            $table->string('nama');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->decimal('harga', 12, 2)->nullable();
            $table->string('ukuran');
            $table->string('warna')->nullable();
            $table->boolean('is_unggulan')->default(false);
            $table->string('foto_utama');
            $table->timestamps();
        });

        // 3. Program PKL
        Schema::create('program_pkl', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('lokasi');
            $table->integer('kuota')->default(0);
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['Buka', 'Tutup'])->default('Buka');
            $table->timestamps();
        });

        // 4. Bursa Kerja (BKK)
        Schema::create('bursa_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('posisi');
            $table->string('lokasi');
            $table->string('rentang_gaji')->nullable();
            $table->text('persyaratan');
            $table->date('batas_pendaftaran');
            $table->enum('status', ['Aktif', 'Tutup'])->default('Aktif');
            $table->timestamps();
        });

        // 5. Fasilitas
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });

        // 6. Guru
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('jabatan');
            $table->string('mata_pelajaran');
            $table->string('foto');
            $table->timestamps();
        });

        // 7. Alumni
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun_lulus');
            $table->string('pekerjaan_saat_ini');
            $table->text('testimoni');
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumni');
        Schema::dropIfExists('guru');
        Schema::dropIfExists('fasilitas');
        Schema::dropIfExists('bursa_kerja');
        Schema::dropIfExists('program_pkl');
        Schema::dropIfExists('produk');
        Schema::dropIfExists('kategori_produks');
    }
};