<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UMKMResource\Pages;
use App\Models\UMKM;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UMKMResource extends Resource
{
    protected static ?string $model = UMKM::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_umkm')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('alamat_umkm')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_umkm')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kategori')
                    ->searchable()
                    ->limit(50), // Mengatur batasan tampilan

                Tables\Columns\TextColumn::make('alamat_umkm')
                    ->searchable()
                    ->limit(50), // Mengatur batasan tampilan
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListUMKMS::route('/'),
            'create' => Pages\CreateUMKM::route('/create'),
            'edit' => Pages\EditUMKM::route('/{record}/edit'),
        ];
    }
}