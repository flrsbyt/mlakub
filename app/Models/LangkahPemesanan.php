<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LangkahPemesanan extends Model
{
    use HasFactory;

    protected $table = 'langkah_pemesanan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'ikon',
        'urutan',
        'status',
    ];
}
