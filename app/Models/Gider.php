<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gider extends Model
{
    use HasFactory;

    protected $table = 'gider';

    protected $fillable = [
        'cari',
        'duzenlemeTarih',
        'seriNo',
        'odemeStatus',
        'bankName',
        'odemeTarih',
        'sonOdeme',
        'tags',
        'description',
        'giderTip',
        'araToplam',
        'kdv',
        'digerVergi',
        'faturaTutar'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'gider_categories', 'gider_id', 'category_id');
    }
}
