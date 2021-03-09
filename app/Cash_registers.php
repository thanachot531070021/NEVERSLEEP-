<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cash_registers extends Model
{
    public $fillable = ['money_type', 'amount', 'pricesum'];


    /**
     *
     * @return App\Product
     */
    // public function user()
    // {
    //     return $this->belongsTo('App\User', 'user_id', 'id');
    // }
}
