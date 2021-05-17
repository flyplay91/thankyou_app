<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iplist extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'store_url', 'ip_address'
    ];
}
