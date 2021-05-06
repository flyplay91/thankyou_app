<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
	public function brands()
    {
        return $this->hasMany('App\Brand')->orderBy('created_at', 'desc');
    }

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    protected $fillable = [
        'url'
    ];
}
