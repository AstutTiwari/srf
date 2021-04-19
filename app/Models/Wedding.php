<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    public $timestamps = true;
    protected $table = "weddings";
    protected $fillable = [
        'id',
        'text',
        'banner_path',
        'banner_name',
        'status'
    ];
}
