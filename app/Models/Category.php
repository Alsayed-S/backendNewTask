<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract
{
    use Translatable;

    // Specify the attributes that can be translated
    public $translatedAttributes = ['name', 'details'];

    // Other model properties and methods
    protected $fillable = ['name', 'details'];
}
