<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->belongsTo('App\Categories');
    }

    public function orderProduct() {
        return $this->hasMany('App\OrderProduct');
    }
}
