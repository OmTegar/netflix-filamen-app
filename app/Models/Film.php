<?php

namespace App\Models;

use App\Models\Aktor;
use App\Models\Genre;
use App\Models\Studio;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Film extends Model
{
    use HasFactory;

    protected $fillable = ['Judul', 'film_genres', 'Studio_id', 'Tahun', 'film_aktors', 'URL_Film'];

    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'film_genres')->withTimestamps();
    }

    public function studio()
    {
        return $this->belongsTo(Studio::class, 'Studio_id');
    }

    public function aktors()
    {
        return $this->belongsToMany(Aktor::class, 'film_aktors')->withTimestamps();
    }


    protected static function booted()
    {
        static::saving(function ($film) {

            if ($film->isDirty('URL_Film')) {
                // Ambil URL video lama dari database
                $oldVideoUrl = $film->getOriginal('URL_Film');

                // Hapus video lama dari sistem file server
                if ($oldVideoUrl && Storage::disk('public')->exists($oldVideoUrl)) {
                    Storage::disk('public')->delete($oldVideoUrl);
                }
            }
        });
    }
}