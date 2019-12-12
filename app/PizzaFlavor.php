<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaFlavor extends Model
{
    public function pizzaType()
    {
        return $this->belongsTo('App\PizzaType');
    }
}
