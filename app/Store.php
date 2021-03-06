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

    public function emails()
    {
        return $this->hasMany('App\Email');
    }

    public function trackings()
    {
        return $this->hasMany('App\Tracking');
    }
    protected $fillable = [
        'url', 'total_visitor_count', 'unique_visitor_count', 'avarage_store_time', 'avarage_product_time', 'email_count', 'total_product_click_count', 'feedback_rating_1', 'feedback_rating_2', 'feedback_rating_3', 'feedback_rating_4', 'feedback_rating_5'
    ];
}
