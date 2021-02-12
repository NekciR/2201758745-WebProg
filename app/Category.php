<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function article(){
        return $this->hasMany(Article::class);
    }

    public static function getAllCategories(){
        return static::all();
    }
}
