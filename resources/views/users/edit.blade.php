@extends('templates.custom')
@section('title', 'Редактирование')
@section('content')
    @include('inc.message')
    <main>
        <a href="{{ route('user.profile') }}">Назад в профиль</a>
        <h1>Редактировать информацию профиля</h1>
        <form action="{{ route('user.update', auth()->id()) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="username"> Никнейм <span class="required">*</span></label>
                <input type="text" name="username" id="username" value="{{ old('username')??$user->username }}" required>
            </div>
            <div class="form-group">
                <label for="email"> Электронная почта <span class="required">*</span></label>
                <input type="email" name="email" id="email" value="{{ old('email')??$user->email }}" required>
            </div>
            <div class="form-group">
                <label for="desc"> Обо мне</label>
                <textarea name="description" id="description" rows="5" cols="15">{{ old('description')??$user->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="date"> Дата рождения <span class="required">*</span></label>
                <input type="date" name="birth_date" id="date" value="{{ old('birth_date')??$user->birth_date }}" required>
            </div>
            <div class="form-group" id="cover-load">
                <label>Аватар</label>
                <label for="avatar" id="cover-label">
                    <div class="label-desc">Нажмите, чтобы загрузить изображение</div>
                    <input type="file" name="avatar" id="avatar" hidden="true">
                </label>
                <div id="file-cont">
                    <img src="{{ $user->avatar }}" style="width: 200px; height: 200px; object-fit: cover" alt="avatar" id="avatarImg">
                </div>
            </div>

            <div class="form-group">
                <label for=""></label>
                <button name="submit" class="btn confirm" id="submit">Обновить</button>
            </div>
        </form>
    </main>
@endsection
@push('script')
    <script>
        loadFileAdd = document.querySelector('#avatar')
        contCover = document.querySelector('#file-cont')

        loadFileAdd.addEventListener('change', e=>{
            avatarImg.src=URL.createObjectURL(e.target.files[0])
        })
    </script>

@endpush
