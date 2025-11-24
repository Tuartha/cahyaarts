<?php

namespace App\Filament\Resources\ContactItemsResource\Pages;

use App\Filament\Resources\ContactItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactItems extends EditRecord
{
    protected static string $resource = ContactItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->requiresConfirmation()
                ->modalHeading('Hapus Kontak')
                ->modalDescription('Apakah Anda yakin ingin menghapus data ini?')
                ->successNotificationTitle('Data berhasil dihapus'),
        ];
    }

    // Redirect setelah update
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    // Opsional: Ubah notifikasi sukses
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Perubahan berhasil disimpan';
    }
}
