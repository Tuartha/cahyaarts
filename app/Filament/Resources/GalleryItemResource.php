<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages\EditAboutPage;
use App\Filament\Resources\GalleryItemResource\Pages;
use App\Filament\Resources\GalleryItemResource\RelationManagers;
use App\Models\GalleryItems;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryItemResource extends Resource
{
    protected static ?string $model = GalleryItems::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Item Galeri';

    protected static ?string $navigationGroup = 'Item Halaman';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image')
                    ->label('Gambar/Foto')
                    ->image()
                    ->directory('about-page')
                    ->visibility('public')
                    ->disk('public')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->maxSize(2048) // 2MB
                    ->helperText('Ukuran maksimal: 2MB. Format: JPG, PNG, WEBP')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),
            
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Deskripsi gambar...')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->helperText('Urutan tampilan gambar dalam galeri.'),
                
                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->label('Active'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar Banner')
                    ->circular()
                    ->defaultImageUrl(url('/images/gallery.png')),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->html()
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
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
                    ->modalHeading('Detail Gallery')
                    ->modalContent(fn (GalleryItems $record): \Illuminate\Contracts\View\View => view(
                        'filament.resources.gallery-items.view',
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
            'index' => Pages\ListGalleryItems::route('/'),
            'create' => Pages\CreateGalleryItem::route('/create'),
            'edit' => Pages\EditGalleryItem::route('/{record}/edit'),
        ];
    }
}
