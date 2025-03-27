<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Регистрация пользователя
    public function register(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // Создание нового пользователя
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return response()->json(['message' => 'Пользователь успешно зарегистрирован'], 201);
    }

    // Авторизация пользователя
    public function login(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Проверка существования пользователя
        $user = User::where('email', $validatedData['email'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json(['message' => 'Неверный email или пароль'], 401);
        }

        // Генерация JWT-токена (опционально)
        // В данном случае мы просто возвращаем данные пользователя
        return response()->json(['user' => $user], 200);
    }
}