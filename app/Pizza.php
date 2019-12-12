<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $guarded = [];

    public function orderDetail()
    {
        return $this->belongsTo('App\OrderDetail');
    }


    public function pizzaSize() {

        return $this->belongsTo('App\PizzaSize');
    }

    
    public function pizzaCrust() {

        return $this->belongsTo('App\PizzaCrust');
    }

    public function pizzaType() {

        return $this->belongsTo('App\PizzaType');
    }

}
