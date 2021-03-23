<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductBanner extends Model
{
    public $timestamps = true;
    protected $table = "product_banners";
    protected $fillable = [
        'id',
        'name',
        'slug',
        'url',
        'order',
        'title',
        'sub_title',
        'status'
    ];
}
