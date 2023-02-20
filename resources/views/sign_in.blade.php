@extends('layout.index')

@section('content')
    @guest
        <main class="auth">
            <div class="errors">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <p>
                            {{ $error }}
                        </p>
                    @endforeach
                @endif
            </div>
            <div class="container">
                <form method="post" action="{{ route('login') }}">
                    <h2>Авторизация</h2>
                    @csrf
                    <input type="email" name="email" placeholder="E-Mail">
                    <input type="password" name="password" placeholder="Пароль">
                    <input class="button" type="submit" value="Войти">
                </form>

                <form method="post" action="{{ route('register') }}">
                    @csrf
                    <h2>Регистрация</h2>
                    <input type="text" name="username" placeholder="Имя">
                    <input type="email" name="email" placeholder="E-Mail">
                    <input type="password" name="password" placeholder="Пароль">
                    <input type="password" name="re_password" placeholder="Подтверждение пароля">
                    <input class="button" type="submit" value="Войти">
                </form>
            </div>
        </main>
    @endguest
@endsection
