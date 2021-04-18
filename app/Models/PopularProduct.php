<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopularProduct extends Model
{
    public $timestamps = true;
    protected $table = "popular_products";
    protected $fillable = [
        'id',
        'slug',
        'banner_path',
        'banner_name',
        'title',
        'sub_title',
        'category_id',
        'status',
        'parent_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductBanner','category_id');
    }
    public function info()
    {
        return $this->hasOne('App\Models\ProductInfo','product_id');
    }
}
