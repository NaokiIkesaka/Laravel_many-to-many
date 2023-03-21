@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $recipe->title }}</h1>
    <p>説明: {{ $recipe->description }}</p>
    <p>材料:</p>
    <pre>{{ $recipe->ingredients }}</pre>
    <p>手順:</p>
    <pre>{{ $recipe->instructions }}</pre>
    <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-secondary">編集</a>
    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
</div>
@endsection
