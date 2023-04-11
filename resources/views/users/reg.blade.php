@extends('templates.custom')
@section('title', 'Регистрация')
@section('content')
    @include('inc.message')
<main>

    <form action="{{route('user.store')}}" method="post" class="reg">
        @csrf
        <h1>Станьте частью сообщества!</h1>

        <input type="text" class="form-control" name="username" id="name"
               value="{{ old('username') }}" placeholder="Никнейм">
        @error('username')
        <span class="is-invalid">{{ $message }}</span>
        @enderror

        <input type="date" class="form-control" name="birth_date" id="birth_date"
               value="{{ old('birth_date') }}" placeholder="Дата рождения">
        @error('birth_date')
        <span  class="is-invalid">{{ $message }}</span>
        @enderror


        <input type="email" class="form-control" name="email" id="email"
               value="{{ old('email') }}" placeholder="Email">
        @error('email')
        <span  class="is-invalid">{{ $message }}</span>
        @enderror

        <input type="password" class="form-control " name="password"
               id="password" placeholder="Пароль">
        @error('password')
        <span  class="is-invalid">{{ $message }}</span>
        @enderror

        <input type="password" class="form-control"
               name="password_confirmation" id="password_confirmation" placeholder="Повтор пароля">
        @error('password_confirmation')
        <span  class="is-invalid">{{ $message }}</span>
        @enderror
        <label for="rules" class="rules">
            <input type="checkbox" name="rules" id="rules">
            Я согласен с правилами сайта
        </label>
        <button id="btn-signup" class="btn register">Зарегистрироваться</button>
    </form>
</main>
@endsection

@push('script')
    <script>
        document.getElementById('btn-signup').disabled = true

        document.getElementById('rules').addEventListener('change', (e) => {
            document.getElementById('btn-signup').disabled = !e.target.checked
        })
    </script>
@endpush

