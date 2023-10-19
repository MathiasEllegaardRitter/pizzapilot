<?php

namespace App\Filament\Resources\BreakesResource\Pages;

use App\Filament\Resources\BreakesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBreakes extends EditRecord
{
    protected static string $resource = BreakesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
