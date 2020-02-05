<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    public function orders() {
        return $this->belongsTo('App\Orders');
    }

    public function products() {
        return $this->belongsTo('App\Product');
    }
}
