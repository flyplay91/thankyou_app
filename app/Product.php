<?php
  
namespace App;
  
use Illuminate\Database\Eloquent\Model;
   
class Product extends Model
{
	public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    protected $fillable = [
        'brand_id', 'product_title', 'product_link', 'product_description', 'product_price', 'product_image'
    ];
}