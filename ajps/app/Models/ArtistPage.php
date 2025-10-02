<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'fullname',
        'description',
        'cover_photo',
        'image_path',
    ];

    protected $casts = [
        'image_path' => 'array', // automatic decode/encode JSON
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
}