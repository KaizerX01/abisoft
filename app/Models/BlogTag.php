<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    


    public function posts()
{
    return $this->belongsToMany(BlogPost::class);
}
}
