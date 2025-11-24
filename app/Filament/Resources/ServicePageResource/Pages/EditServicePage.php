<?php

namespace App\Filament\Resources\ServicePageResource\Pages;

use App\Filament\Resources\ServicePageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServicePage extends EditRecord
{
    protected static string $resource = ServicePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->requiresConfirmation()
                ->modalHeading('Hapus Halaman Layanan')
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
