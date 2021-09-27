<?php

namespace App\Rules\Setting;

use App\Models\Language;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;

class CheckLanguageRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $language_id;
    public function __construct($langid)
    {
        $this->language_id = $langid;
    }

    
    public function passes($attribute, $value)
    {   
        

        if (Language::find($this->language_id)->status) {
            return true;
        }
    }

    
    public function message()
    {
        return 'Seçilən Dil Düzgün Deyil Vəya Aktiv Deyil !';
    }
}
