<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Hapus kolom lama jika ada
            if (Schema::hasColumn('contacts', 'nama')) $table->dropColumn('nama');
            if (Schema::hasColumn('contacts', 'subjek')) $table->dropColumn('subjek');
            if (Schema::hasColumn('contacts', 'pesan')) $table->dropColumn('pesan');
            if (Schema::hasColumn('contacts', 'is_read')) $table->dropColumn('is_read');

            // Tambah kolom baru jika belum ada
            if (!Schema::hasColumn('contacts', 'email')) $table->string('email')->nullable();
            if (!Schema::hasColumn('contacts', 'whatsapp')) $table->string('whatsapp')->nullable();
            if (!Schema::hasColumn('contacts', 'instagram')) $table->string('instagram')->nullable();
            if (!Schema::hasColumn('contacts', 'tiktok')) $table->string('tiktok')->nullable();
            if (!Schema::hasColumn('contacts', 'alamat')) $table->text('alamat')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            if (Schema::hasColumn('contacts', 'email')) $table->dropColumn('email');
            if (Schema::hasColumn('contacts', 'whatsapp')) $table->dropColumn('whatsapp');
            if (Schema::hasColumn('contacts', 'instagram')) $table->dropColumn('instagram');
            if (Schema::hasColumn('contacts', 'tiktok')) $table->dropColumn('tiktok');
            if (Schema::hasColumn('contacts', 'alamat')) $table->dropColumn('alamat');
        });
    }
};