<?php

namespace App\Filament\Resources\FilmResource\Pages;

use App\Filament\Resources\FilmResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilm extends EditRecord
{
    protected static string $resource = FilmResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function saveAndClose(array $data)
    {
        // Ambil ID film yang sedang diedit
        $filmId = $this->record->getKey();

        // Ambil data aktors yang dipilih dari formulir
        $aktorsIds = $data['aktors'] ?? [];

        // Sinkronisasi aktors tanpa menghapus yang sudah ada
        $this->record->aktors()->syncWithoutDetaching($aktorsIds);

        // Lanjutkan dengan logika simpan dan tutup bawaan
        return parent::saveAndClose($data);
    }
}
