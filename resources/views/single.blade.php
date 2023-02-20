@extends('layout.index')

@section('content')
    <main>
        <div class="left-section">
            <img src="{{ $books->image_url }}" alt="{{ $books['name'] }}">
        </div>
        <div class="right-section">
            <h2>{{ $books['name'] }}</h2>
            <p>Описание: </p>
            <div class="text">{{ $books['text'] }}</div>
        </div>
    </main>
@endsection
