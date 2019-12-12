<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PizzaType extends Model
{

    protected $guarded = [];
    
    public function pizza()
    {
        return $this->belongsTo('App\Pizza');
    }

    public function pizzaFlavor() {
        return $this->belongsTo('App\PizzaFlavor', 'flavor_id');
    }

    public function pizzaToppingOne() {
        return $this->belongsTo('App\PizzaTopping', 'topping_area_1_id');
    }

    public function pizzaToppingTwo() {
        return $this->belongsTo('App\PizzaTopping', 'topping_area_2_id');
    }

    public function pizzaToppingThree() {
        return $this->belongsTo('App\PizzaTopping', 'topping_area_3_id');
    }
}
