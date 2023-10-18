<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FilmResource\Pages;
use App\Filament\Resources\FilmResource\RelationManagers;
use App\Models\Film;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FilmResource extends Resource
{
    protected static ?string $model = Film::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Film')
                    ->schema([
                        Forms\Components\TextInput::make('Judul')
                            ->label('Judul Film')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('film_genres')
                            ->relationship('Genre', 'Name')
                            ->placeholder('Pilih Genre')
                            ->searchable()
                            ->multiple()
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('Studio_id')
                            ->relationship('Studio', 'Name')
                            ->placeholder('Pilih Studio')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\TextInput::make('Tahun')
                            ->label('Tahun Film')
                            ->required()
                            ->maxLength(255),   
                    ])->columnSpan(2)->columns(2),  
                Group::make([
                    Section::make('Film')
                        ->schema([
                            Forms\Components\FileUpload::make('URL_Film')
                            ->label('Unggah Film (MP4/MOV)')
                            ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                            ->multiple(false)
                            ->directory('Movies-URL')
                            ->visibility('public')
                        ]),
                    Section::make('Aktors')
                    ->schema([
                        Select::make('film_aktors')
                            ->relationship('aktors', 'Name')
                            ->placeholder('Pilih Aktor')
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->required(), 
                    ])
                ]),

            ])->columns([
                'default' => 3,
                'sm' => 3,
                'md' => 3,
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('genre.Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('studio.Name')
                    ->searchable(),
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
            'index' => Pages\ListFilms::route('/'),
            'create' => Pages\CreateFilm::route('/create'),
            'edit' => Pages\EditFilm::route('/{record}/edit'),
        ];
    }
}