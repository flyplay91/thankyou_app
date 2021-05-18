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

    public function storeTimes()
    {
        return $this->hasMany('App\Storetime');
    }

    protected $fillable = [
        'url', 'total_visitor_count', 'unique_visitor_count', 'avarage_store_time', 'avarage_product_time', 'total_click_count', 'dayly_click_count', 'email_count'
    ];
}
