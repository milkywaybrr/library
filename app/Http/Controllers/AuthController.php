<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'email' => 'required|email',
           'password' => 'required|min:6'
        ], [
            'email.required' => 'Введиет E-Mail',
            'email.email' => 'Неверный формат E-Mail',
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимальная длина пароля 6 символов'

        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        if(!Auth::attempt($validator->validated())) {
            return back()->withErrors(['invalid' => 'Пользователь не существует!']);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:re_password'
        ], [
            'username.min' => 'Минимальная длина 3 символа',
            'username.required' => 'Введите имя',
            'email.unique' => 'Пользователь уже существует',
            'email.required' => 'Введиет E-Mail',
            'email.email' => 'Неверный формат E-Mail',
            'password.required' => 'Введите пароль',
            'password.min' => 'Минимальная длина пароля 6 символов',
            'password.same' => 'Пароли не совпадают',

        ]);

        if($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $user = User::query()->create(
            ['password'=>Hash::make($request['password'])] + $validator->validated()
        );

        Auth::login($user);

        return redirect()->route('home');
    }
}
