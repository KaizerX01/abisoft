<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    



    public function tags()
{
    return $this->belongsToMany(BlogTag::class);
}
}
