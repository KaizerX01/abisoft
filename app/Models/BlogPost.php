<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = ['title','content','image','description'];



    public function tags()
{
    return $this->belongsToMany(BlogTag::class);
}
}
