<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film_genre extends Model
{
    use HasFactory;

    protected $fillable = ['film_id', 'genre_id'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'Film_id');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'Genre_id');
    }
}
