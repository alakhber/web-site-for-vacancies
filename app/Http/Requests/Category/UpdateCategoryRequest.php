<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'=>['required','min:2','max:50'],
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Boş Buraxmaq Olmaz !',
            'name.min'=>'Minimum 2 Simvol Olmalıdır !',
            'name.min'=>'Maksimum 50 Simvol Olmalıdır !',
        ];
    }
}
