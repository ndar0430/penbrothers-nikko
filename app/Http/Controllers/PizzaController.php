<?php

namespace App\Http\Controllers;

use App\Pizza;
use App\Repositories\Pizza\PizzaRepository;
use Illuminate\Http\Request;

class PizzaController extends Controller
{

    protected $pizzaRepository;
    public function __construct(PizzaRepository $pizzaRepository) {

        $this->pizzaRepository = $pizzaRepository;

    }
 
    public function elements() {

        $pizzaElements = $this->pizzaRepository->getElements();

        return response()->json($pizzaElements);

    }

    public function store(Request $request) {

        $data = $request->all();

        $store = $this->pizzaRepository->store($data);

        return response()->json([
            'message' => $store
        ]);


    }

}
