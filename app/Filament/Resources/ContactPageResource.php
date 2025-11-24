<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactPageResource\Pages;
use App\Filament\Resources\ContactPageResource\RelationManagers;
use App\Models\ContactPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactPageResource extends Resource
{
    protected static ?string $model = ContactPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Halaman Kontak';

    protected static ?string $navigationGroup = 'Halaman';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Halaman Kontak')
                    ->description('Atur konten halaman kontak')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Homepage')
                            ->maxLength(255)
                            ->required()
                            ->helperText('Judul utama yang ditampilkan di halaman'),

                        Forms\Components\TextInput::make('address')
                            ->label('Alamat')
                            ->placeholder('Alamat Sanggar')
                            ->maxLength(255)
                            ->required()
                            ->helperText('Alamat lengkap sanggar'),

                        Forms\Components\TextInput::make('button_text')
                            ->label('Teks Button')
                            ->placeholder('Contact Page')
                            ->maxLength(20)
                            ->required()
                            ->helperText('Teks yang ditampilkan pada tombol di halaman utama'),
                    ]),
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

                Tables\Columns\TextColumn::make('address')
                    ->label('Alamat')
                    ->url(fn ($record) => $record->button_link, shouldOpenInNewTab: true) // make it clickable
                    ->color('info')
                    ->copyable() 
                    ->copyMessage('Link berhasil disalin!')
                    ->copyMessageDuration(1500)
                    ->searchable()
                    ->limit(30)
                    ->default('-')
                    ->placeholder('Belum ada link'),
                    
                Tables\Columns\TextColumn::make('button_text')
                    ->label('Teks Tombol')
                    ->searchable()
                    ->sortable()
                    ->default('Tidak ada'),

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
                    ->modalHeading('Detail Home Page')
                    ->modalContent(fn (ContactPage $record): \Illuminate\Contracts\View\View => view(
                        'filament.resources.contact-page.view',
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
            'index' => Pages\ListContactPages::route('/'),
            'create' => Pages\CreateContactPage::route('/create'),
            'edit' => Pages\EditContactPage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Contact Page';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Contact Pages';
    }
}
