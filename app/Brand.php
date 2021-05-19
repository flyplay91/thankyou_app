<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	public function store()
    {
        return $this->belongsTo('App\Store');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    protected $fillable = [
        'store_id', 'brand_image', 'brand_title', 'brand_tag', 'brand_description', 'brand_tag_color', 'avarage_product_count'
    ];
}
