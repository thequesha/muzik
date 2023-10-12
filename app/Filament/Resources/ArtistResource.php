<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtistResource\Pages;
use App\Filament\Resources\ArtistResource\RelationManagers;
use App\Models\Artist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtistResource extends Resource
{
    protected static ?string $model = Artist::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('country_id')
                    ->numeric(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('added_date')
                    ->required(),
                Forms\Components\DateTimePicker::make('last_update')
                    ->required(),
                Forms\Components\Textarea::make('bio_tk')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('bio_ru')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('artwork_url')
                    ->maxLength(255),
                Forms\Components\TextInput::make('thumb_url')
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                    ->required(),
                Forms\Components\TextInput::make('mbid')
                    ->required()
                    ->maxLength(200),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('albums_count')->counts('albums'),
                TextColumn::make('tracks_count')->counts('tracks'),
                ImageColumn::make('thumb_url')->label('Image'),
                // Tables\Columns\TextColumn::make('added_date')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('last_update')
                //     ->dateTime()
                //     ->sortable(),
                // Tables\Columns\TextColumn::make('artwork_url')
                //     ->searchable(),
                // Tables\Columns\TextColumn::make('thumb_url')
                //     ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('mbid')
                //     ->searchable(),
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
            'index' => Pages\ListArtists::route('/'),
            'create' => Pages\CreateArtist::route('/create'),
            'edit' => Pages\EditArtist::route('/{record}/edit'),
        ];
    }
}
