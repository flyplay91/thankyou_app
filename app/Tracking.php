<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    protected $table = 'tracking';

    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'target_url', 'source_url', 'product_title', 'product_price', 'product_qty'
    ];
}
