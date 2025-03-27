@extends('layout')

@section('main_content')


<div class="form-container">
    <h2>Вход в систему</h2>
    <form action="/api/login" method="POST">
        @csrf
        <input type="text" name="username" placeholder="Логин" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Войти</button>
        <a href="/register">Зарегистрироваться</a>
    </form>
</div>


@endsection