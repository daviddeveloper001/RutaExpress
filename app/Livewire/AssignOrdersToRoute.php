<?php

namespace App\Livewire;

use Livewire\Component;

class AssignOrdersToRoute extends Component
{
    public function render()
    {
        return view('livewire.assign-orders-to-route');
    }

    public function assign(Order $order, Route $route): void {
        $route->orders()->attach($order, ['delivery_order' => $this->calculatePosition($route)]);
    }
}
