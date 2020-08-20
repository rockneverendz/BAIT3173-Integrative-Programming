<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Many to one relationship
    public function admin()
    {
        return $this->belongsTo('App\User');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Meal')->using('App\Orderlist');
    }
}
