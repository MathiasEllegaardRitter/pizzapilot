<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ScheduleResource\Pages;
use App\Filament\Resources\ScheduleResource\RelationManagers;
use App\Models\Schedule;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class ScheduleResource extends Resource
{
    protected static ?string $model = Schedule::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TimePicker::make('start_time')->hoursStep(1)->seconds(false),
                Forms\Components\TimePicker::make('end_time')->hoursStep(1)->seconds(false),
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('text'),

                Forms\Components\Toggle::make('special')->live(),
                Forms\Components\Select::make('days')->options([
                    0 => 'Mandag',
                    1 => 'Tirsdag',
                    2 => 'Onsdag',
                    3 => 'Torsdag',
                    4 => 'Fredag',
                    5 => 'Lørdag',
                    6 => 'Søndag'
                ])->multiple()
                ->columnSpanFull()
                ->hidden(fn (Get $get): bool => $get('special')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('text')->searchable(),
                Tables\Columns\TextColumn::make('start_time')
                    ->time('H:i')
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('end_time')
                    ->time('H:i')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('special')->hidden(),
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
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSchedules::route('/'),
            'create' => Pages\CreateSchedule::route('/create'),
            'edit' => Pages\EditSchedule::route('/{record}/edit'),
        ];
    }    
}
