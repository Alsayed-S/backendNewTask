<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'details'];

    // Define the relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
