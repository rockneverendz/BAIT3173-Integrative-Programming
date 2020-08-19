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
    
    use SoftDeletes;
    //
}
