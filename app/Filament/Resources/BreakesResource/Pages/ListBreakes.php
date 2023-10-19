<?php

namespace App\Filament\Resources\BreakesResource\Pages;

use App\Filament\Resources\BreakesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBreakes extends ListRecords
{
    protected static string $resource = BreakesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
