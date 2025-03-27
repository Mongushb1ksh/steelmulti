@extends('layout')

@section('main_content')
<div id="register" class="form-container">
    <h2>Регистрация</h2>
    <form action="/api/register" method="POST">
        @csrf
        <input type="text" placeholder="Имя" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Пароль" required>
        <input type="password" placeholder="Подтвердите пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <p>Уже есть аккаунт? <a href="#">Войдите</a>.</p>
</div>
@endsection