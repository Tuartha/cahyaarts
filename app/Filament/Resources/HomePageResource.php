<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomePageResource\Pages;
use App\Filament\Resources\HomePageResource\RelationManagers;
use App\Models\HomePage;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomePageResource extends Resource
{
    protected static ?string $model = HomePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Halaman Utama';

    protected static ?string $navigationGroup = 'Halaman';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Banner Halaman Utama')
                    ->description('Atur konten halaman utama')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Homepage')
                            ->maxLength(255)
                            ->required()
                            // ->limit(30)
                            ->helperText('Judul utama yang ditampilkan di halaman'),

                        Forms\Components\TextInput::make('deskripsi')
                            ->label('Deskripsi')
                            ->placeholder('Home Page')
                            ->maxLength(255)
                            ->required()
                            ->helperText('Deskripsi yang ditampilkan di halaman')
                            ->columnSpanFull(),

                        Forms\Components\FileUpload::make('background_image')
                            ->label('Gambar/Foto')
                            ->image()
                            ->directory('home-page')
                            ->imageEditor()
                            ->visibility('public')
                            ->disk('public')
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ])
                            ->maxSize(2048) // 2MB
                            ->helperText('Ukuran maksimal: 2MB. Format: JPG, PNG, WEBP')
                            ->openable()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('button_text')
                            ->label('Teks Button')
                            ->placeholder('Homepage')
                            ->maxLength(20)
                            ->required()
                            ->helperText('Teks yang ditampilkan pada tombol di halaman utama'),

                        Forms\Components\TextInput::make('button_link')
                            ->label('Link Button')
                            ->placeholder('Homepage')
                            ->maxLength(255)
                            ->required()
                            ->helperText('Link yang dituju saat tombol diklik'),
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

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->label('Deskripsi'),

                Tables\Columns\ImageColumn::make('background_image')
                    ->label('Gambar Banner')
                    ->circular()
                    ->defaultImageUrl(url('/images/homepage.png')),

                Tables\Columns\TextColumn::make('button_text')
                    ->label('Teks Tombol')
                    ->searchable()
                    ->sortable()
                    ->default('Tidak ada'),

                Tables\Columns\TextColumn::make('button_link')
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
                
                Tables\Actions\ViewAction::make()
                    ->label('Lihat')
                    ->icon('heroicon-o-eye')
                    ->modalHeading('Detail Home Page')
                    ->modalContent(fn (HomePage $record): \Illuminate\Contracts\View\View => view(
                        'filament.resources.home-page.view',
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
            'index' => Pages\ListHomePages::route('/'),
            'create' => Pages\CreateHomePage::route('/create'),
            'edit' => Pages\EditHomePage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Home Page';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Home Pages';
    }
}
