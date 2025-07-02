<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','description','price', 'image', 'category_product_id'];

    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }

}
