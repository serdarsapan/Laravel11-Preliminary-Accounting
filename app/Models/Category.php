<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent','slug','status'];

    public function giders()
    {
        return $this->belongsToMany(Gider::class, 'gider_categories', 'category_id', 'gider_id');
    }

}