<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiderCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_id',
        'gider_id'
    ];

    public function giders()
    {
        return $this->belongsToMany('App\Models\Gider', 'gider_categories', 'category_id', 'id');
    }
}