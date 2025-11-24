<?php

namespace App\Filament\Resources\ContactItemsResource\Pages;

use App\Filament\Resources\ContactItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateContactItems extends CreateRecord
{
    protected static string $resource = ContactItemsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Halaman berhasil dibuat';
    }
}
