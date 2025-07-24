<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['name'];


    public function posts()
{
    return $this->belongsToMany(BlogPost::class);
}
}
