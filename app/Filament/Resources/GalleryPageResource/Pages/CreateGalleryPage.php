<?php

namespace App\Filament\Resources\GalleryPageResource\Pages;

use App\Filament\Resources\GalleryPageResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGalleryPage extends CreateRecord
{
    protected static string $resource = GalleryPageResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Halaman berhasil dibuat';
    }
}
