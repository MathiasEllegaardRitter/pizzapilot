<?php

namespace App\Filament\Resources\MenuResource\Pages;

use App\Filament\Resources\MenuResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\PizzaStore;


class CreateMenu extends CreateRecord
{
    protected static string $resource = MenuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {   
        $userId = Auth::user()->id;
        $pizzaStore = PizzaStore::where('user_id', $userId)->first(); // Get the authenticated 'PizzaStoreId's 'id'.
        $pizzaStoreId = $pizzaStore->id; // Get the specifyed users 'order' from the 'pizzaStore'.

        $data['pizza_stores_id'] = $pizzaStoreId;
        return $data;
    }
}
