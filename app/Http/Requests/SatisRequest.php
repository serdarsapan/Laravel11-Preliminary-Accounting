<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SatisRequest extends FormRequest
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
            'urunHizmet' => 'required|max:255',
            'miktar' => 'required|integer|max:12'
        ];
    }
    public function messages(): array
    {
        return [
            'cari' => 'Cari Alanı Boş Bırakılamaz.',
            'urunHizmet' => 'Ürün/Hizmet Seçiniz!',
            'miktar' => 'Miktar Seçilmelidir.'
        ];
    }
}
