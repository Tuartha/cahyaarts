<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use App\Filament\Resources\GalleryPageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleryPages extends ListRecords
{
    protected static string $resource = GalleryPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
