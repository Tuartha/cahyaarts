<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactItemsResource\Pages;
use App\Filament\Resources\ContactItemsResource\RelationManagers;
use App\Models\ContactItems;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactItemsResource extends Resource
{
    protected static ?string $model = ContactItems::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Item Kontak';

    protected static ?string $navigationGroup = 'Item Halaman';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->disk('public') 
                    ->visibility('public')
                    ->directory('logos') 
                    ->image() 
                    ->maxSize(2048) 
                    ->imageEditor() 
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->helperText('Unggah file gambar untuk logo (maks. 2MB).')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('text')
                    ->label('Social Media')
                    ->placeholder('Input social media text here')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('link')
                    ->label('Link Button')
                    ->placeholder('Social Media')
                    ->maxLength(255)
                    ->required()
                    ->helperText('Link yang dituju saat tombol diklik'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Gambar')
                    ->circular()
                    ->defaultImageUrl(url('/images/social.png')),
                Tables\Columns\TextColumn::make('text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link Tombol')
                    ->url(fn ($record) => $record->button_link, shouldOpenInNewTab: true) // make it clickable
                    ->color('info')
                    ->copyable() // bisa di-copy dengan klik
                    ->copyMessage('Link berhasil disalin!')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->limit(30)
                    ->default('-')
                    ->placeholder('Belum ada link'),
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
            'index' => Pages\ListContactItems::route('/'),
            'create' => Pages\CreateContactItems::route('/create'),
            'edit' => Pages\EditContactItems::route('/{record}/edit'),
        ];
    }
}
