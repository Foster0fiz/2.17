@extends('layouts.app')

@section('title', "Kitoblar Ro'yxati")

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>
    
    <h2 class="mb-4">Kitoblar Ro'yxati</h2>
    
    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Yangi Kitob Qo'shish</a>
    
    @if($books->isEmpty())
        <p class="text-muted">Hozircha hech qanday kitob mavjud emas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kitob Nomi</th>
                    <th>Ta'rif</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->description }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">Ko'rish</a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Haqiqatan ham o‘chirmoqchimisiz?')">O'chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
