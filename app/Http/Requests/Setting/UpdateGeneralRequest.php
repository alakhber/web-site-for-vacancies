<?php

namespace App\Http\Requests\Setting;

use App\Rules\Setting\CheckLanguageRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGeneralRequest extends FormRequest
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
            'title' => ['required', 'max:225'],
            'locale_id' => ['required', new CheckLanguageRule($this->locale_id), 'unique:setting_translatables,locale_id,' . $this->id],
            'keyword' => ['required', 'max:225'],
            'description' => ['required', 'max:225'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Boş Burax Olmaz !',
            'locale_id.required' => 'Boş Burax Olmaz !',
            'keyword.required' => 'Boş Burax Olmaz !',
            'description.required' => 'Boş Burax Olmaz !',
            'locale_id.unique' => 'Məlumat Mövcuddur.Başqa Dil Seçin !',
            'title.max' => 'Maximum 225 Simvola İcazə Verilir !',
            'keyword.max' => 'Maximum 225 Simvola İcazə Verilir !',
            'description.max' => 'Maximum 225 Simvola İcazə Verilir !',

        ];
    }
}
