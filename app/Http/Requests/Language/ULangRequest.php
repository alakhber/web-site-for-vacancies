<?php

namespace App\Http\Requests\Language;

use Illuminate\Foundation\Http\FormRequest;

class ULangRequest extends FormRequest
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
            'locale'=>['required','unique:languages,locale,'.$this->id],
            'country'=>['required'],
        ];
    }

    public function messages()
    {
        return  [
            'locale.required'=>'Boş Buraxmaq Olmaz !',           
            'locale.unique'=>'İstifadə Olunur Başqasını Yoxlayın !',  
            'country.required'=>'Boş Buraxmaq Olmaz !',           
        ];
    }
}
