@extends('layout.index')

@section('content')
    <main class="single">
        <div class="container">
            <div class="left-section">
                <img src="{{ $books->image_url }}" alt="{{ $books['name'] }}">
            </div>
            <div class="right-section">
                <h2>{{ $books['name'] }}</h2>
                <div class="content">
                    <p><b>Категория:</b> {{ $books->categories()->name }}</p>
                    <p><b>Описание:</b> </p>
                    <div class="text">{{ $books['text'] }}</div>
                </div>
                @auth
                    <div class="buttons">
                        <a href="{{ route('delete'), $books }}" class="delete">Удалить</a>
                        <a href="" class="update">Редактировать</a>
                    </div>
                @endauth
            </div>
        </div>
    </main>
@endsection
