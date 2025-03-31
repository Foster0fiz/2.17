@extends('layouts.app')

@section('title', 'Kitob Haqida Ma\'lumot')

@section('content')
<div class="container mt-5">
    <a href="{{ route('books.index') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>

    <h2 class="mb-4">Kitob: {{ $book->title }}</h2>

    <div class="mb-3">
        <h5>Tavsif:</h5>
        <p>{{ $book->description }}</p>
    </div>

    <div class="mb-3">
        <h5>Mualliflar:</h5>
        @if($book->authors->isEmpty())
            <p class="text-muted">Hozircha mualliflar yo'q.</p>
        @else
            <ul>
                @foreach($book->authors as $author)
                    <li>{{ $author->name }}</li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="mb-3">
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Kitobni Tahrirlash</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;"> 
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">Kitobni O'chirish</button>
        </form>
    </div>
</div>
@endsection
