<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->input('user_id');
        $genreId = $request->input('genre_id');
        
        

        $recipes = Recipe::with('user', 'genre');
        
        if ($userId) {
            $recipes = $recipes->where('user_id', $userId);
        }
        
        if ($genreId) {
            $recipes = $recipes->where('genre_id', $genreId);
        }

        $recipes = $recipes->get();
        $users = User::all();
        $genres = Genre::all();

        return view('index', compact('recipes', 'users', 'genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all(); // ジャンルを取得
        return view('create', compact('genres')); // ジャンルをビューに渡す
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'ingredients' => 'required',
        'instructions' => 'required',
        'genre_id' => 'required',
    ]);

    $recipe = new Recipe;
    $recipe->user_id = Auth::id();
    $recipe->title = $request->title;
    $recipe->description = $request->description;
    $recipe->ingredients = $request->ingredients;
    $recipe->instructions = $request->instructions;
    $recipe->genre_id = $request->genre_id;
    $recipe->save();

    return redirect()->route('recipes.show', $recipe->id);
}

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        return view('show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'このレシピを編集する権限がありません。');
        }
        return view('edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'このレシピを更新する権限がありません。');
        }
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'ingredients' => 'required',
        'instructions' => 'required',
    ]);

    $recipe->title = $request->title;
    $recipe->description = $request->description;
    $recipe->ingredients = $request->ingredients;
    $recipe->instructions = $request->instructions;
    $recipe->save();

    return redirect()->route('recipes.show', $recipe->id);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->user_id !== auth()->id()) {
            abort(403, 'このレシピを削除する権限がありません。');
        }
    $recipe->delete();
    return redirect()->route('recipes.index');
    }

}
