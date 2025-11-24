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
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->requiresConfirmation()
                ->modalHeading('Hapus Halaman Galeri')
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
