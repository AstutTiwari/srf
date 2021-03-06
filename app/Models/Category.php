<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $table = "categories";
    protected $fillable = [
        'id',
        'name',
        'banner_path',
        'banner_name',
        'slug',
        'status'
    ];



    
}
