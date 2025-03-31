@extends('layouts.app')

@section('title', 'Muallifni Tahrirlash')

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>
    
    <h2 class="mb-4">Muallifni Tahrirlash: {{ $author->name }}</h2>

    <!-- Вывод ошибок валидации -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $author->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Muallif Ismi</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="{{ old('name', $author->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="bio" class="form-label">Biografiya</label>
            <textarea class="form-control" id="bio" name="bio" rows="3" required>{{ old('bio', $author->bio) }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" 
                   value="{{ old('email', $author->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="books" class="form-label">Kitoblarni Tanlang</label>
            <select class="form-control" id="books" name="books[]" multiple>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" 
                        {{ in_array($book->id, old('books', $author->books->pluck('id')->toArray())) ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Bir nechta kitob tanlash uchun CTRL tugmasini bosib turib tanlang</small>
        </div>

        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</div>
@endsection
