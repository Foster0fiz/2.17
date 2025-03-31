@extends('layouts.app')

@section('title', 'Kitobni Tahrirlash')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Kitobni Tahrirlash</h2>

    <form action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Kitob Nomi</label>
            <input type="text" class="form-control" id="title" name="title" 
                   value="{{ $book->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Kitob Tavsifi</label>
            <textarea class="form-control" id="description" name="description" 
                      rows="3">{{ $book->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="authors" class="form-label">Mualliflarni Tanlang</label>
            <select class="form-control" id="authors" name="authors[]" multiple>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}"
                        {{ $book->authors->contains($author->id) ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Bir nechta muallif tanlash uchun CTRL tugmasini bosib turib tanlang</small>
        </div>

        <button type="submit" class="btn btn-primary">Yangilash</button>
    </form>
</div>
@endsection