<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class UpdateContactRequest extends FormRequest
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
    public function rules()
    {
        return [
            'phone' => ['required', 'max:10', ':10', 'regex:/^012[0-9]{7}$/'],
            'mobil' => ['required', 'max:12', 'min:12', 'regex:/^994(55|51|50|60|70|77|99)[2-9]{1}[0-9]{6}$/'],
            'email' => ['required', 'min:7', 'max:225', 'email:rfc,dns'],
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Boş Buraxmaq Olmaz !',
            'phone.max' => 'Maksimum 10 Simvol Olmalıdır !',
            'phone.min' => 'Minimum 10 Simvol Olmalıdır !',
            'phone.regex' => 'Yazılış Formatı Düzgün Deyil.Nümunə: 012xxxxxx !',

            'mobil.required' => 'Boş Buraxmaq Olmaz !',
            'mobil.max' => 'Maksimum 12 Simvol Olmalıdır !',
            'mobil.min' => 'Minimum 12 Simvol Olmalıdır !',
            'mobil.regex' => 'Yazılış Formatı Düzgün Deyil.Nümunə: 994(50,51,55,60,70,77,99)xxxxxxx !',

            'email.required' => 'Boş Buraxmaq Olmaz !',
            'email.max' => 'Maksimum 225 Simvol Olmalıdır !',
            'email.min' => 'Minimum 7 Simvol Olmalıdır !',
            'email.email' => 'E-Poçt Mövcud Deyil !',
        ];
    }
}
