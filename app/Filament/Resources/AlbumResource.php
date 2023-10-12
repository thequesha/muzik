<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Models\Album;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->maxLength(255)
                    ->default('album'),
                Forms\Components\DateTimePicker::make('release_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('added_date')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255)
                    ->default('Wanted'),
                Forms\Components\TextInput::make('artwork_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('thumb_url')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('mbid')
                    ->required()
                    ->maxLength(200),
                Forms\Components\Toggle::make('is_national')
                    ->required(),
                Forms\Components\TextInput::make('show_count')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('artists.name')->label('Artist')
                    ->searchable(),
                TextColumn::make('tracks_count')
                    ->counts('tracks'),
                // TextColumn::make('release_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('added_date')
                //     ->dateTime()
                //     ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                // TextColumn::make('artwork_url')
                //     ->searchable(),
                ImageColumn::make('thumb_url')->label('Image'),

                // TextColumn::make('mbid')
                //     ->searchable(),
                // IconColumn::make('is_national')
                //     ->boolean(),
                TextColumn::make('show_count')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
