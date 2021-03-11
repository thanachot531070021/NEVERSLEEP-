<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ['id', 'product_name', 'price', 'stock', 'created_at', 'updated_at'];


    /**
     *
     * @return App\Product
     */
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'user_id', 'id');
    // }
}
