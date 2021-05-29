<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreVisitorCount extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'store_id', 'total_visitor_count', 'unique_visitor_count'
    ];
}
