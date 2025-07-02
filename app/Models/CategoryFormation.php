<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFormation extends Model
{
     protected $fillable = ['name'];


    public function formations(){
        return $this->hasMany(Formation::class);
    }
}
