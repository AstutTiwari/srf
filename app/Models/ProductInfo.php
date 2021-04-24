<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class ProductInfo extends Model
{
    public $timestamps = true;
    protected $table = "product_infos";
    protected $fillable = [
        'id',
        'product_id',
        'category_id',
        'rate',
        'metal_type',
        'purity',
        'seq_no',
        'design_no',
        'g_wt',
        'n_wt',
        'diamand_wt',
        'diamand_pics',
        'color_stone_wt',
        'clarity',
        'color_id',
        'quality',
        'shape_id',
        'size',
        'metal_rate',
        'polish_charges',
        'making_charges',
        'metal_value',
        'diamond_value',
        'labour_value',
        'diamond_handling_charge',
        'total_value',
        'discount_value',
        'final_value',
        'gst'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
