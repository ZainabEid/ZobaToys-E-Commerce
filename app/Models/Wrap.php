<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Wrap extends Model
{
    use Translatable;

    public $translatedAttributes = ['name','description'];

   

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

}
