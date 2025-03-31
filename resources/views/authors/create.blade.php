@extends('layouts.app')

@section('title', "Yangi Muallif Qo'shish")

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>
    
    <h2 class="mb-4">Yangi Muallif Qo'shish</h2>

    <!-- Вывод ошибок валидации, если есть -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label">Muallif Ismi</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Muallif ismini kiriting" required>
        </div>
        
        <div class="mb-3">
            <label for="bio" class="form-label">Biografiya</label>
            <textarea class="form-control" id="bio" name="bio" placeholder="Muallif biografiyasini kiriting"></textarea>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Muallif emailini kiriting" required>
        </div>
        
        <div class="mb-3">
            <label for="books" class="form-label">Kitoblarni Tanlang</label>
            <select class="form-control" id="books" name="books[]" multiple>
                @isset($books)
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                @else
                    <option disabled>Kitoblar mavjud emas</option>
                @endisset
            </select>
            <small class="text-muted">Bir nechta kitob tanlash mumkin</small>
        </div>
        
        <button type="submit" class="btn btn-primary">Saqlash</button>
    </form>
</div>
@endsection
