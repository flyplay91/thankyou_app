<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
	public function store()
    {
        return $this->belongsTo('App\Store', 'store_id');
    }

    protected $fillable = [
        'store_id', 'brand_title', 'brand_tag', 'brand_description'
    ];
}
