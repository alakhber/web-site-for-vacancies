<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable  = ['logo','locale','phone','mobil','address','location','email'];

    public function getMapAttribute(){
        $locale = $this->location;
        $pregMatch = [];
        preg_match('/src=\"(.*)\"/isU', $this->location, $pregMatch);
        return $pregMatch[1];
    }
}
