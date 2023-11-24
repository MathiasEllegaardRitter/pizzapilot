<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeliveryAddressResource\Pages;
use App\Filament\Resources\DeliveryAddressResource\RelationManagers;
use App\Models\DeliveryAddress;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeliveryAddressResource extends Resource
{
    protected static ?string $model = DeliveryAddress::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('street')->required(),
                Forms\Components\TextInput::make('city')->required(),
                Forms\Components\TextInput::make('postal_code')->required(),
                Forms\Components\Textarea::make('comment'),
                Forms\Components\Select::make('customer_id')->options(Customer::all()->pluck('user.name', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('street')->searchable(),
                Tables\Columns\TextColumn::make('city')->searchable(),
                Tables\Columns\TextColumn::make('postal_code')->searchable(),
                Tables\Columns\TextColumn::make('customer.created_at'),
                Tables\Columns\TextColumn::make('customer.user.name'),
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
    
    // public static function getRelations(): array
    // {
    //     return [
    //         //
    //     ];
    // }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeliveryAddresses::route('/'),
            'create' => Pages\CreateDeliveryAddress::route('/create'),
            'edit' => Pages\EditDeliveryAddress::route('/{record}/edit'),
        ];
    }    
}
