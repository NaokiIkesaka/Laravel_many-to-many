@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新しいレシピを投稿</h1>
    <form action="{{ route('recipes.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="genre_id">ジャンル</label>
            <select name="genre_id" id="genre_id" class="form-control">
                <option value="">ジャンルを選択</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">説明</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">材料</label>
            <textarea name="ingredients" id="ingredients" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="instructions">手順</label>
            <textarea name="instructions" id="instructions" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">投稿</button>
    </form>
</div>
@endsection
