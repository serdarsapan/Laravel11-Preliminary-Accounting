<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'statusUrnHzm',
        'code',
        'name',
        'barcode',
        'tags',
        'origin',
        'gtip',
        'description',
        'hzmCode',
        'hzmName',
        'hzmBarcode',
        'hzmTags',
        'hzmDescription',
        'statusAlis',
        'alisFiyat',
        'statusSatis',
        'satisFiyat',
        'kdv',
        'discount'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blog_categories', 'blog_id', 'category_id');
    }
    public function satis1()
    {
        return $this->belongsToMany(Satis::class, 'blog_satis', 'blog_id', 'satis_id');
    }
}