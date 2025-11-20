<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPageResource extends Resource
{
    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationLabel = 'Tentang Kami';
    
    protected static ?string $navigationGroup = 'Halaman';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Tentang Kami')
                    ->description('Atur konten halaman Tentang Kami')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->placeholder('Tentang Kami')
                            ->required()
                            ->maxLength(255)
                            // ->limit(30)
                            ->helperText('Judul utama yang ditampilkan di halaman'),
                        
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
                        
                        Forms\Components\RichEditor::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Tulis deskripsi tentang sanggar Anda...')
                            ->required()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'strike',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull()
                            ->helperText('Gunakan editor untuk format teks (bold, italic, list, dll)'),
                    ])
                    ->columns(1)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-o-document-text'),
                
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png')),
                
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->html()
                    ->searchable(),
                
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
                    ->modalHeading('Detail Tentang Kami')
                    ->modalContent(fn (AboutPage $record): \Illuminate\Contracts\View\View => view(
                        'filament.resources.about-page.view',
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
    
    // Customize labels
    public static function getModelLabel(): string
    {
        return 'About Page';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Tentang Kami';
    }
}