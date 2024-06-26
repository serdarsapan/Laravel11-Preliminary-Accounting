<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cari extends Model
{
    use HasFactory;
    
    protected $table = 'cari';

    protected $fillable = [
        'cariStatus',
        'code',
        'name',
        'surname',
        'type',
        'islemTarih',
        'tags',
        'tckn',
        'vergiNo',
        'vergiDaire',
        'mersis',
        'tel',
        'mail',
        'web',
        'faks',
        'adresTip',
        'adres',
        'il',
        'ilce',
        'posta',
        'vade',
        'iskonto',
        'tutarAcilis',
        'acilisStatus',
        'islemTarihAcilis',
        'vadeTarihAcilis',
        'tutarBorc',
        'borcStatus',
        'islemTarihBorc',
        'vadeTarihBorc',
        'description',
        'hesapNo',
        'bank',
        'branch',
        'iban',
        'hesapName',
        'yetkiliName',
        'yetkiliTel',
        'yetkiliMail'
    ];
}
