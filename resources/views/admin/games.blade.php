@extends('templates.admin')
@section('title', 'Администрирование игр')
@section('content')
    @include('inc.message')
    @if($user)
        <a href="{{ route('admin.games.index') }}">Вернуться к общему списку</a>
    @endif
    <h1>Список игр {{ $user??'' }}</h1>
    <div class="cont">
        <div class="grid-row head">
            <p>Название игры</p>
            <p>Количество лайков</p>
            <p>Автор</p>
            <p>Количество дизлайков</p>
            <div></div>
        </div>
        @foreach($games as $game)
            <div class="grid-row">
                <a href="{{ route('games.show', $game->id) }}" class="title">{{ $game->name }}</a>
                <p>{{ $game->count_likes }}</p>
                <a href="{{ route('admin.games.index', $game->user_id) }}">{{ $game->user->username }}</a>
                <p class="count_bans">{{ $game->count_dislikes }}</p>
                <div class="btns">
                    <a href="{{ $game->baned ?route('admin.games.unban', $game->id):route('admin.games.ban', $game->id) }}" class="btn ban">{{ $game->baned ?"Разблокировать":"Заблокировать" }}</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection
