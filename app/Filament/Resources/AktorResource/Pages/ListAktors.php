<?php

namespace App\Filament\Resources\AktorResource\Pages;

use App\Filament\Resources\AktorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAktors extends ListRecords
{
    protected static string $resource = AktorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
