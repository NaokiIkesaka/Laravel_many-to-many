<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    public function create()
{
    return view('genres.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:genres|max:255',
    ]);

    $genre = new Genre;
    $genre->name = $request->name;
    $genre->save();

    return redirect()->route('recipes.index')->with('success', 'ジャンルが作成されました');
}

}
