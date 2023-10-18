<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('index', compact('films'));
    }

    public function MoviesShow($id)
    {
        $film = Film::with('studio', 'genre')->find($id);
        // dd($film);
        return view('movies.show', compact('film'));
    }

    public function MoviesWatch($id)
    {
        $film = Film::with('studio', 'genre')->find($id);
        // dd($film);
        return view('movies.watch', compact('film'));
    }
}
