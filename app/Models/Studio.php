<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $fillable = ['Name'];

    public function film()
    {
        return $this->hasMany(Film::class, 'Studio_id');
    }
}
