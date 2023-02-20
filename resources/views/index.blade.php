@extends('layout.index')

@section('content')

    <main class="all_books">
        <div class="container">
            <h2>Все книги</h2>
            <div class="books">
                @foreach($books as $book)
                    <div class="book" onclick="location.href='{{ route('book', $book['id']) }}'">
                        <img src="{{ $book->image_url }}" alt="{{ $book['name'] }}">
                        <h3 class="name">{{ $book['name'] }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
