<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name','description','price', 'image', 'category_service_id'];

    protected $casts = [
        'price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(CategoryService::class, 'category_service_id');
    }

}
