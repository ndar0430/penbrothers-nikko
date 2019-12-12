<?php
namespace App\Repositories\Order;

class OrderRepository {

    public function get() {

        $order = Order::get();

        return $order;
    }

    public function getById($id) {

        $order = Order::where('id', $id)->get();

        return $order;
    }

    public function store($request) {

        $order = Order::create($request);

        return $order;
        
    }
}