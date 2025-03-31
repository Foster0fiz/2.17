@extends('layouts.app')

@section('title', "Yangi Kitob Qo'shish")

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Yangi Kitob Qo'shish</h2>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Kitob Nomi</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Kitob Tavsifi</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="mb-3">
    <label for="authors" class="form-label">Mualliflarni Tanlang (ixtiyoriy)</label>
    <select class="form-control" id="authors" name="authors[]" multiple>
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
    <small class="text-muted">Bir nechta muallif tanlash uchun CTRL tugmasini bosib turib tanlang</small>
</div>

        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</div>
@endsection