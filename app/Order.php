<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Many to one relationship
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function meals()
    {
        return $this->belongsToMany('App\Meal', 'orderlists')
                    ->withPivot([
                            'quantity',
                            'price_each',
                        ]);
    }
}
