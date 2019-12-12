<?php
namespace App\Repositories\Pizza;

use App\OrderDetail;
use App\Pizza;
use App\PizzaCrust;
use App\PizzaFlavor;
use App\PizzaSize;
use App\PizzaTopping;
use App\PizzaType;

class PizzaRepository {


    public function getElements() {

        $pizzaCrust = PizzaCrust::get();

        $pizzaSize = PizzaSize::get();

        $pizzaFlavor = PizzaFlavor::get();

        $pizzaTopping = PizzaTopping::get();

        return [
            'pizzaCrust' => $pizzaCrust,
            'pizzaSize' => $pizzaSize,
            'pizzaTopping' => $pizzaTopping,
            'pizzaFlavor' => $pizzaFlavor
        ];
    }

    public function store($request) {

        $order = OrderDetail::orderBy('created_at', 'DESC')->first();

        if(empty($order)){
            $id = 1;
        }
        else {
            $id = $order->order_id + 1;
        }

        foreach ($request as $req)
        {

            $req['pizza_type_id'] = $this->savePizzaType($req);

            $pizza = Pizza::create([
                'pizza_size_id' => $req['pizza_size_id'],
                'pizza_crust_id' => $req['pizza_crust_id'],
                'pizza_type_id' => $req['pizza_type_id']
            ]);

            $order = OrderDetail::create([
                'order_id' => $id,
                'pizza_id' => $pizza->id
            ]);
        }

        return $pizza;

    }

    public function savePizzaType($request) {

        $type = [
            'flavor_id' => $request['flavor_id'],
            'topping_area_1_id' => $request['topping_area_1_id'],
            'topping_area_2_id' => $request['topping_area_2_id'],
            'topping_area_3_id' => $request['topping_area_3_id'],
        ];


        $store = PizzaType::create($type);

        return $store->id;

    }
}