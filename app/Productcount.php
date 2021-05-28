<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productcount extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'store_id', 'brand_id', 'click_count'
    ];
}
