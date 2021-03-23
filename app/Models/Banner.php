<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $timestamps = true;
    protected $table = "banners";
    protected $fillable = [
        'id',
        'name',
        'url',
        'order',
        'title',
        'sub_title',
        'status'
    ];
}
