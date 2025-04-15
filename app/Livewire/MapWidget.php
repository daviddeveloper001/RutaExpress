<?php

namespace App\Livewire;

use Livewire\Component;

class MapWidget extends Component
{

    protected $listeners = ['refreshMap' => '$refresh'];
    public function render() {
        $config = [
            'center' => 'Cali, Colombia',
            'zoom' => 12,
            'markers' => [
                [
                    'position' => ['lat' => 3.4516, 'lng' => -76.5320],
                    'title' => 'RutaExpress HQ',
                ],
            ],
        ];
        return view('livewire.map-widget', compact('config'));
    }
}
