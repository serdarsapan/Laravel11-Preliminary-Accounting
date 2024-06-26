<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'iban',
        'description',
        'bankName',
        'branch',
        'accountNo',
        'oDate',
        'currency',
        'balance',
        'status'
    ];

   
}