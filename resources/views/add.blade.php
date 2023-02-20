@extends('layout.index')

@section('content')

    <main class="add">
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
            <form method="post" enctype="multipart/form-data" action="{{ route(('book.create')) }}">
                @csrf
                <h2>Добавить книгу</h2>
                <input type="text" name="name" placeholder="Название книги" value="{{ old('name') }}">
                <textarea name="text" placeholder="Описание">{{ old('text') }}</textarea>
                <input type="file" name="file">
                <input class="button" type="submit" value="Сохранить">
            </form>
        </div>
    </main>

@endsection
