<?php

namespace App\Filament\Resources\DeliveryAddressResource\Pages;

use App\Filament\Resources\DeliveryAddressResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeliveryAddresses extends ListRecords
{
    protected static string $resource = DeliveryAddressResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
