<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslatable extends Model
{
    use HasFactory;
    protected $fillable = ['parent_id','name'];

}
