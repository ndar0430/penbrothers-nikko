<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizza_crusts')->insert([

            [
                'crust' => 'hand_tossed',
            ],
            [
                'crust' => 'thin_crust',
            ]
        ]);

        DB::table('pizza_sizes')->insert([

            [
                'size' => 'large',
            ],
            [
                'size' => 'family',
            ]
        ]);


        DB::table('pizza_toppings')->insert([

            [
                'topping' => 'sausage',
            ],
            [
                'topping' => 'mushroom',
            ]
        ]);

        DB::table('pizza_flavors')->insert([

            [
                'flavor' => 'hawaiian',
            ],
            [
                'flavor' => 'chicken_fajita',
            ],
            [
                'flavor' => 'custom',
            ]
        ]);


    }
}
