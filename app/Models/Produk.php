<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'kategori_id',
        'nama',
        'slug',
        'deskripsi',
        'harga',
        'ukuran',
        'warna',
        'is_unggulan',
        'foto_utama',
    ];

    // Relasi ke KategoriProduk
    public function kategori()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }
}