@extends('layouts.app')

@section('content')
<div class="container">
    <h1>レシピを編集: {{ $recipe->title }}</h1>
    <form action="{{ route('recipes.update', $recipe->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $recipe->title }}">
        </div>
        <div class="form-group">
            <label for="description">説明</label>
            <textarea name="description" id="description" class="form-control">{{ $recipe->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">材料</label>
            <textarea name="ingredients" id="ingredients" class="form-control">{{ $recipe->ingredients }}</textarea>
        </div>
        <div class="form-group">
            <label for="instructions">手順</label>
            <textarea name="instructions" id="instructions" class="form-control">{{ $recipe->instructions }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
    </form>
</div>
@endsection

