<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo'=>['required','file','image'],
        ];
    }

    public function messages()
    {
        return [
            'logo.required'=>'Fayl Seçilməlidir !',
            'logo.file'=>'Göndərilən Məlumat Fayl Deyil !',
            'logo.image'=>'Fayl Tipi Düzgün Deyil !',
        ];
    }
}
