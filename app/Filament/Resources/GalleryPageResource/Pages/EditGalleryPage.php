<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use App\Filament\Resources\GalleryPageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGalleryPage extends EditRecord
{
    protected static string $resource = GalleryPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
