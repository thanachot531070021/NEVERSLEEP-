<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public $fillable = ['id', 'product_name', 'price', 'stock'];

    /**
     * Relation with table user
     *
     * @return App\Machine
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
