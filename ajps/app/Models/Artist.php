<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'contact_number',
        'email',
    ];

    public function pages()
    {
        return $this->hasMany(ArtistPage::class, 'artist_id');
    }
}
