<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'title',
        'release_date',
        'added_date',
        'status',
        'artwork_url',
        'thumb_url',
        'description',
        'type',
        'mbid',
        'is_national',
        'show_count',
    ];

    public static function import(array $items)
    {
        foreach ($items as $item) {
            $album = Album::updateOrCreate([
                'mbid' => $item['id'],
            ], [
                'title' => $item['album_title']['String'],
                'release_date' => $item['release_date']['String'],
                'added_date' => $item['date_added']['String'],
                'status' => strtolower($item['status']['String']),
                'artwork_url' => $item['artwork_url']['String'],
                'thumb_url' => $item['thumb_url']['String'],
                'description' => $item['album_title']['String'],
                'type' => strtolower($item['type']['String']),
                'is_national' => False,
            ]);

            $artist = Artist::where('mbid', $item['artist_id'])->first();

            if ($artist) {
                $artist->albums()->syncWithoutDetaching([$album->id]);
            }
        }
    }

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_album');
    }

    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'album_track');
    }
}
