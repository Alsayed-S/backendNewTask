<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    // Specify the attributes that can be translated
    public $translatedAttributes = ['title'];

    // Other model properties and methods
    protected $fillable = ['title', 'brand','image','details','price','category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
