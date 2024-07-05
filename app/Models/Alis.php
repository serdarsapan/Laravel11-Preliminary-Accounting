<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alis extends Model
{
    use HasFactory;

    protected $fillable = [
        'cari',
        'cariAdres',
        'duzenlemeTarih',
        'duzenlemeSaat',
        'seriNo',
        'odemeStatus',
        'vadeTarih',
        'tags',
        'description',
        'urunHizmet',
        'miktar',
        'birimFiyat',
        'toplam',
        'toplamKdv',
        'kdv'
    ];
}
