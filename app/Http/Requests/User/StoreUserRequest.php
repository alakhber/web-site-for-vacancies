<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'fullname'=>['required','max:50'],
            'username'=>['required','max:25','unique:users,username'],
            'email'=>['required','max:50','unique:users,email'],
            'password'=>['required','min:6','confirmed'],
            'photo'=>['nullable','file','image'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'=>'Boş Buraxmaq Olmaz !',
            'fullname.max'=>'Maksimum 50 Simvol Olmalıdır !',
            'username.required'=>'Boş Buraxmaq Olmaz !',
            'username.max'=>'Maksimum 25 Simvol Olmalıdır !',
            'username.unique'=>'Başqa İstifadəçi İstifadə Edir !',
            'email.required'=>'Boş Buraxmaq Olmaz !',
            'email.max'=>'Maksimum 50 Simvol Olmalıdır !',
            'email.unique'=>'Başqa İstifadəçi İstifadə Edir !',
            'password.required'=>'Boş Buraxmaq Olmaz !',
            'password.min'=>'Minimum 6 Simvol Olmalıdır !',
            'password.confirmed'=>'Şifrələr Uyğun Deyil !',
            'photo.file'=>'Məlumat Düzgün Deyil !',
            'photo.image'=>'Format Düzgün Deyil !',
        ];
    }
}
