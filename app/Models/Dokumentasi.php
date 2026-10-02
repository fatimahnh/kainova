<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $table = 'dokumentasis';

    protected $fillable = [
        'judul',
        'kategori',
        'foto',
        'keterangan',
    ];
}