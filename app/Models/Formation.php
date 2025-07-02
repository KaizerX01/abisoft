<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['name','description','price', 'image', 'category_formation_id'];

    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(CategoryFormation::class, 'category_formation_id');
    }
}
