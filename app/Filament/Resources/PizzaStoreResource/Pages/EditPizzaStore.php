<?php

namespace App\Filament\Resources\PizzaStoreResource\Pages;

use App\Filament\Resources\PizzaStoreResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPizzaStore extends EditRecord
{
    protected static string $resource = PizzaStoreResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
