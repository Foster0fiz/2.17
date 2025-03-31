@extends('layouts.app')

@section('title', 'Muallif Haqida Ma\'lumot')

@section('content')
<div class="container mt-5">
    <a href="{{ route('authors.index') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>
    
    <h2 class="mb-4">Muallif: {{ $author->name }}</h2>

    <div class="mb-3">
        <h5>Biografiya:</h5>
        <p>{{ $author->bio }}</p>
    </div>

    <div class="mb-3">
        <h5>Yozgan Kitoblar:</h5>
        @if($author->books->isEmpty())
            <p class="text-muted">Hozircha kitoblar yo'q.</p>
        @else
            <ul>
                @foreach($author->books as $book)
                    <li>{{ $book->title }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div>
        <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning">Muallifni Tahrirlash</a>
        <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;"> 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">O'chirish</button>
        </form>
    </div>
</div>
@endsection
