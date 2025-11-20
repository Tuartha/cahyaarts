<?php

namespace App\Filament\Resources\ContactItemsResource\Pages;

use App\Filament\Resources\ContactItemsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContactItems extends ListRecords
{
    protected static string $resource = ContactItemsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
