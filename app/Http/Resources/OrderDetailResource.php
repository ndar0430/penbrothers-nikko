<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->order_id,
            'size' => $this->pizza->pizzaSize->size,
            'crust' => $this->pizza->pizzaCrust->crust,
            'flavor' => $this->pizza->pizzaType->pizzaFlavor->flavor,
        ];
    }
}
