<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{
    // Many to one relationship
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }
    
    public function orders()
    {
        return $this->belongsToMany('App\Order')->using('App\Orderlist');
    }
    use SoftDeletes;
    //
}
