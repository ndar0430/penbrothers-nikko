<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaSize extends Model
{
    public function pizza()
    {
        return $this->belongsTo('App\Pizza');
    }
}
