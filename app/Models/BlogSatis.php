<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSatis extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id',
        'satis_id'
    ];

    public function satis1()
    {
        return $this->belongsToMany('App\Models\Satis', 'blog_satis', 'blog_id', 'id');
    }
}