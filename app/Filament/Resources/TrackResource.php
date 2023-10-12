<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackResource\Pages;
use App\Filament\Resources\TrackResource\RelationManagers;
use App\Models\Track;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackResource extends Resource
{
    protected static ?string $model = Track::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(100),
                TextInput::make('duration')
                    ->required()
                    ->numeric(),

                Select::make('artist_id')
                    ->relationship(name: 'artists', titleAttribute: 'name')->label('Artist'),
                Select::make('album_id')
                    ->relationship(name: 'albums', titleAttribute: 'title')->label('Album'),

                TextInput::make('track_number')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('bit_rate')
                    ->required()
                    ->numeric(),
                Textarea::make('lyrics')
                    ->columnSpanFull(),
                TextInput::make('audio_url')
                    ->maxLength(255),
                TextInput::make('mbid')
                    ->required()
                    ->maxLength(200),
                Toggle::make('is_national')
                    ->required(),
                TextInput::make('thumb_url')
                    ->maxLength(255),
                TextInput::make('artwork_url')
                    ->maxLength(255),
                TextInput::make('listen_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('status')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('artists.name')->label('Artist')
                    ->searchable(),
                TextColumn::make('albums.title')->label('Album')
                    ->searchable(),
                TextColumn::make('duration')
                    ->numeric()
                    ->formatStateUsing(fn (int $state): string  => ($state / 1000) . 's')
                    ->sortable(),
                // TextColumn::make('track_number')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('bit_rate')
                    ->numeric()
                    ->formatStateUsing(fn (int $state): string  => ($state / 1000) . ' kb/s')
                    ->sortable(),

                TextColumn::make('audio_url')
                    ->copyable()
                    ->limit(20)
                    ->copyableState(fn (Track $record): string => "URL: {$record->audio_url}"),

                // ImageColumn::make('thumb_url')->label('Image'),



                TextColumn::make('listen_count')
                    ->numeric()
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListTracks::route('/'),
            'create' => Pages\CreateTrack::route('/create'),
            'edit' => Pages\EditTrack::route('/{record}/edit'),
        ];
    }
}
