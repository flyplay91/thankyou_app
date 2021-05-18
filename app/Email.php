<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store');
    }

    protected $fillable = [
        'store_id', 'user_email'
    ];
}
