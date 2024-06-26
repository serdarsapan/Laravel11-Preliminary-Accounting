<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satis extends Model
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

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_satis', 'satis_id', 'blog_id');
    }

}