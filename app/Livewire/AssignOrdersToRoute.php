<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Route;
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
