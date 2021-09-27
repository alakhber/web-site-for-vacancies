<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingTranslatable extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_id','locale_id','keyword','description','title'
    ];
    public function language(){
        return $this->hasOne(Language::class,'id','locale_id');
    }
    
}
