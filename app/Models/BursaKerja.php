<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BursaKerja extends Model
{
    protected $table = 'bursa_kerja';
    protected $fillable = ['nama_perusahaan', 'posisi', 'lokasi', 'rentang_gaji', 'persyaratan', 'batas_pendaftaran', 'status'];
}