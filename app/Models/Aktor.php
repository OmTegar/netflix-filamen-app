<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktor extends Model
{
    use HasFactory;

    protected $fillable = ['Name', 'Umur', 'Region_id'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'Region_id');
    }

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_aktors')->withTimestamps();
    }

}