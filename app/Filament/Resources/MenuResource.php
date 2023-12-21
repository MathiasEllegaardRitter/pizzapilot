<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers\ProductsRelationManager;
use App\Models\Menu;
use App\Models\PizzaStore;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('menu_name')->required(),
                Forms\Components\Toggle::make('is_active'),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        $userId = Auth::user()->id; // Get the authenticated 'userId'.
        $pizzaStore = PizzaStore::where('user_id', $userId)->first(); // Get the authenticated 'PizzaStoreId's 'id'.
        if ($pizzaStore === null ) {// If the authenticated user does not have any 'pizzaStoreId' set the id to the 'userId'.
            $pizzaStoreId = $userId; // Set the 'pizzaStoreId' to the 'userId'.
        } else {
            $pizzaStoreId = $pizzaStore->id; // Get the specifyed users 'order' from the 'pizzaStore'.
        }
        
        if ($userId == 1) { // If the authenticated user is the 'admin' user, then show all the 'menus' from all the 'pizzaStores'.
            return $table
                ->columns([
                    Tables\Columns\TextColumn::make('menu_name')->searchable(),
                    Tables\Columns\TextColumn::make('is_active')->searchable(),
                    Tables\Columns\TextColumn::make('pizza_stores.location')->searchable(),
                ])
                ->filters([
                    //
                ])
                ->actions([
                    Tables\Actions\EditAction::make(),
                ])
                ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                        Tables\Actions\DeleteBulkAction::make(),
                    ]),
                ]);
        } else // If the authenticated user is not the 'admin' user, then show only the 'menus' from the 'pizzaStore' that the user is Authorized to.
        {
            return $table //I only want to access the data connected to the 'user_id' of the authenticated user
            ->modifyQueryUsing(function (Builder $query) use ($pizzaStoreId) {
                $query->where('pizza_stores_id', $pizzaStoreId);
            })
            ->columns([
                Tables\Columns\TextColumn::make('menu_name')->searchable(),
                Tables\Columns\TextColumn::make('is_active')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
        }
}
    
    public static function getRelations(): array
    {
        return [
            //
            ProductsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }    
}
