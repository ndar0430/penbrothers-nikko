<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderDetailResource;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function get() {

        $orders = OrderDetail::with('pizza')->get();

        return OrderDetailResource::collection($orders)->values()->all();

        
    }
}
