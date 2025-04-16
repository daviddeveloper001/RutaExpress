<?php

namespace App\Livewire;

use Livewire\Component;

class MapWidget extends Component {
    public $apiKey;
    
    public function mount() {
        $this->apiKey = config('services.google.maps_key');
    }

    public function render() {
        //dd('MapWidget render method called');
        return view('livewire.map-widget');
    }
    
}
