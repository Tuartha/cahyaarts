<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryPageResource\Pages;
use App\Filament\Resources\GalleryPageResource\RelationManagers;
use App\Models\GalleryPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryPageResource extends Resource
{
    protected static ?string $model = GalleryPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Halaman Galeri';

    protected static ?string $navigationGroup = 'Halaman';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Gallery Page Settings')
                ->description('Configure your gallery page')
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Page Title')
                        ->maxLength(255)
                        ->placeholder('Our Gallery'),
                    
                    Forms\Components\Textarea::make('short_description')
                        ->label('Description')
                        ->rows(3)
                        ->placeholder('Browse our collection of images...'),
                    
                    Forms\Components\TextInput::make('items_to_display')
                        ->label('Items to Display per Page')
                        ->numeric()
                        ->default(12)
                        ->minValue(1)
                        ->maxValue(100)
                        ->required(),
                ])
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->weight('bold')
                    ->searchable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->label('Description')
                    ->limit(50),
                Tables\Columns\TextColumn::make('items_to_display')
                    ->label('Items per Page')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->icon('heroicon-o-clock'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil'),
                
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Gallery Page')
                    ->modalContent(fn (GalleryPage $record): \Illuminate\Contracts\View\View => view(
                        'filament.resources.gallery-page.view',
                        ['record' => $record],
                    )),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada data')
            ->emptyStateDescription('Klik tombol di bawah untuk membuat data halaman')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->label('Buat Halaman')
                    ->icon('heroicon-o-plus'),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleryPages::route('/'),
            'create' => Pages\CreateGalleryPage::route('/create'),
            'edit' => Pages\EditGalleryPage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Gallery Page';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Gallery Pages';
    }
}
