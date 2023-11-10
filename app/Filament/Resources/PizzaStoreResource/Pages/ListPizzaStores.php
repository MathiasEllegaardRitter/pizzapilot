<?php

namespace App\Filament\Resources\PizzaStoreResource\Pages;

use App\Filament\Resources\PizzaStoreResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPizzaStores extends ListRecords
{
    protected static string $resource = PizzaStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
