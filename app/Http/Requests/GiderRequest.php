<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cari' => 'required|max:255',
            'giderTip' => 'required',
            'araToplam' => 'required|integer',
            'faturaTutar' => 'required|integer'
        ];
    }
    public function messages():array
    {
        return [
            'cari' => 'Cari Alan Boş Bırakılamaz.',
            'giderTip' => 'Gider Tipi Seçiniz.',
            'araToplam' => 'Ara Toplam Giriniz.',
            'faturaTutar' => 'Fatura Tutar İçin Gerekli Alanları Doldurunuz.'
        ];
    }
}
