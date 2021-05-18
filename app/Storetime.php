<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storetime extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'store_id', 'store_time', 'product_time'
    ];
}
