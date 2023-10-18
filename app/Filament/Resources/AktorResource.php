<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AktorResource\Pages;
use App\Filament\Resources\AktorResource\RelationManagers;
use App\Models\Aktor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AktorResource extends Resource
{
    protected static ?string $model = Aktor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Name')
                    ->label('Aktor Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Umur')
                    ->label('Aktor Umur')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('Region_id')
                    ->relationship('region', 'Name')
                    ->placeholder('Pilih Region')
                    ->searchable()
                    ->preload()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Name')
                ->searchable(),
                Tables\Columns\TextColumn::make('Umur')
                ->searchable(),
                Tables\Columns\TextColumn::make('region.Name')
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListAktors::route('/'),
            'create' => Pages\CreateAktor::route('/create'),
            'edit' => Pages\EditAktor::route('/{record}/edit'),
        ];
    }    
}
