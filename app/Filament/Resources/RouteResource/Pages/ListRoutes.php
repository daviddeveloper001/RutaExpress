<?php

namespace App\Filament\Resources\RouteResource\Pages;

use App\Filament\Resources\RouteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\RouteResource\Widgets\MapWidgetView;

class ListRoutes extends ListRecords
{
    protected static string $resource = RouteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            MapWidgetView::class,
        ];
    }
}
