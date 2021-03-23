<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    public $timestamps = true;
    protected $table = "social_icons";
    protected $fillable = [
        'id',
        'name',
        'icon_name',
        'redirect_url',
        'order',
        'status'
    ];
}
