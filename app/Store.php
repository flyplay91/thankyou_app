<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	public function brands()
    {
        return $this->hasMany('App\Brand');
    }

    protected $fillable = [
        'url'
    ];
}