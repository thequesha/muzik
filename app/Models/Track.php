<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    public $timestamps = false;


    protected $fillable = [
        'title',
        'duration',
        'track_number',
        'bit_rate',
        'lyrics',
        'audio_url',
        'mbid',
        'is_national',
        'thumb_url',
        'artwork_url',
        'listen_count',
        'status',
    ];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_track');
    }

    public function albums()
    {
        return $this->belongsToMany(Album::class, 'album_track');
    }


    public static function import(array $items)
    {
        foreach ($items as $item) {
            $track = Track::updateOrCreate(
                [
                    'mbid' => $item['id']
                ],
                [
                    'title' => $item['track_title']['String'],
                    'duration' => $item['track_duration']['String'],
                    'track_number' => $item['track_number']['String'],
                    'bit_rate' => $item['bit_rate']['Int64'],
                    'audio_url' => $item['location']['String'],
                    'status' => true,
                ]
            );

            $artist = Artist::where('mbid', $item['artist_id'])->first();

            if ($artist) {
                $artist->tracks()->syncWithoutDetaching([$track->id]);
            }

            $album = Album::where('mbid', $item['album_id'])->first();

            if ($album) {
                $album->tracks()->syncWithoutDetaching([$track->id]);
            }
        }
    }
}
