<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'mbid',
        'name',
        'added_date',
        'last_update',
        'bio_tk',
        'bio_ru',
        'artwork_url',
        'thumb_url',
        'country_id',
        'status',
    ];

    public static function import(array $items)
    {
        foreach ($items as $item) {
            $artist = Artist::updateOrCreate(
                ['mbid' => $item['id']],
                [
                    'name' => $item['artist_name'],
                    'added_date' => $item['date_added']['String'],
                    'last_update' => $item['last_updated']['String'],
                    'artwork_url' => $item['artwork_url']['String'],
                    'thumb_url' => $item['thumb_url']['String'],
                    'status' => true,
                ]
            );
        }
    }


    public function albums()
    {
        return $this->belongsToMany(Album::class, 'artist_album');
    }

    public function tracks()
    {
        return $this->belongsToMany(Track::class, 'artist_track');
    }
}
