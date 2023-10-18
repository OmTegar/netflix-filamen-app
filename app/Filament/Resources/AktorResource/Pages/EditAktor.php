<?php

namespace App\Filament\Resources\AktorResource\Pages;

use App\Filament\Resources\AktorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAktor extends EditRecord
{
    protected static string $resource = AktorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
