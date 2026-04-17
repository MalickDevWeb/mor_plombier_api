<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'description', 'image_url', 'price_indicator'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
