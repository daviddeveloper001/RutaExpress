<?php

namespace App\Filament\Resources\RouteResource\Widgets;

use Filament\Widgets\Widget;

class MapWidgetView extends Widget
{
    protected static string $view = 'filament.resources.route-resource.widgets.map-widget-view';


    protected function getViewData(): array
    {
        return [
            'apiKey' => config('services.google.maps_key'),
        ];
    }


    
}
