@extends('layouts.app')

@section('content')
<div class="container">
    <h1>新しいジャンルを作成</h1>
    <form action="{{ route('genres.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">ジャンル名</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">ジャンルを作成</button>
    </form>
</div>
@endsection
