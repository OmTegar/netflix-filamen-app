<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film_aktor extends Model
{
    use HasFactory;

    protected $fillable = ['film_id', 'aktor_id'];

    public function film()
    {
        return $this->belongsTo(Film::class, 'Film_id');
    }

    public function aktor()
    {
        return $this->belongsTo(Aktor::class, 'Aktor_id');
    }
}
