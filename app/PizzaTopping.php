<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaTopping extends Model
{
    public function pizzaType()
    {
        return $this->belongsTo('App\PizzaType');
    }
}
