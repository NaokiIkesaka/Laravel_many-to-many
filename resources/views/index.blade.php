@extends('layouts.app')

@section('content')
<div class="container">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="flex justify-between items-center mb-4">
                <a href="{{ route('recipes.create') }}" class="bg-white border border-black hover:bg-gray-100 text-black font-semibold text-sm py-2 px-4 rounded">レシピを投稿</a>
                
                <form action="{{ route('recipes.index') }}" method="GET" class="flex items-center">
                    <div class="flex items-center">
                        <label for="user_id" class="mr-2">投稿者で絞り込む:</label>
                        <select name="user_id" id="user_id" class="form-select" onchange="this.form.submit()">
                            <option value="">すべての投稿者</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ (request('user_id') == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center ml-4">
                        <label for="genre_id" class="mr-2">ジャンルで絞り込む:</label>
                        <select name="genre_id" id="genre_id" class="form-select" onchange="this.form.submit()">
                            <option value="">すべてのジャンル</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $genre->id == request('genre_id') ? 'selected' : '' }}>{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>    
            <h1 class="text-4xl font-bold mb-4">レシピ一覧</h1>
            <ul>
                @foreach($recipes as $recipe)
                    <li class="mt-3">
                        <a href="{{ route('recipes.show', $recipe->id) }}" class="text-xl">{{ $recipe->title }}</a>
                        @if($recipe->user)
                            <span class="text-sm text-gray-500 ml-2">投稿者: {{ $recipe->user->name }}</span>
                        @else
                            <span class="text-sm text-gray-500 ml-2">投稿者: 不明</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
