<?php

namespace App\Filament\Resources\ScheduleResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class DaysRelationManager extends RelationManager
{
    protected static string $relationship = 'days';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Toggle::make('is_special')->live(),
                    Forms\Components\TimePicker::make('start_time')->hoursStep(1)->seconds(false),
                    Forms\Components\TimePicker::make('end_time')->hoursStep(1)->seconds(false),
                    Forms\Components\DatePicker::make('date')->hidden(fn (Get $get): bool => $get('is_special') == false),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('start_time')
                ->time('H:i')
                ->sortable(),
                    
                Tables\Columns\TextColumn::make('end_time')
                ->time('H:i')
                ->sortable(),
                Tables\Columns\TextColumn::make('date')
                ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
