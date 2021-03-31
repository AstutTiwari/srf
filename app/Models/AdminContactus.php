<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminContactus extends Model
{
    public $timestamps = true;
    protected $table = "admin_contactus";
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'id',
        'text',
        'contact_number'
    ];
}
