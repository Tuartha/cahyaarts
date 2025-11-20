<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicePageResource\Pages;
use App\Filament\Resources\ServicePageResource\RelationManagers;
use App\Models\ServicePage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicePageResource extends Resource
{
    protected static ?string $model = ServicePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Halaman Layanan';

    protected static ?string $navigationGroup = 'Halaman';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->placeholder('Service Page')
                    ->maxLength(255)
                    ->required()
                    ->helperText('Judul utama yang ditampilkan di halaman'),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->placeholder('Service Page')
                    ->maxLength(255)
                    ->required()
                    ->helperText('Deskripsi yang ditampilkan di halaman')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->limit(50)
                    ->label('Deskripsi')
                    ->sortable()
                    ->wrap(),
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
                    ->modalContent(fn (ServicePage $record): \Illuminate\Contracts\View\View => view(
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
            'index' => Pages\ListServicePages::route('/'),
            'create' => Pages\CreateServicePage::route('/create'),
            'edit' => Pages\EditServicePage::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return 'Service Page';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Service Pages';
    }
}
