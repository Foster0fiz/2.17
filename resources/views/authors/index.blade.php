@extends('layouts.app')

@section('title', "Mualliflar Ro'yxati")

@section('content')
<div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3" style="font-size: 25px;">Ortga</a>
    
    <h2 class="mb-4">Mualliflar Ro'yxati</h2>
    
    <a href="{{ route('authors.create') }}" class="btn btn-success mb-3">Yangi Muallif Qo'shish</a>
    
    @if($authors->isEmpty())
        <p class="text-muted">Hozircha hech qanday muallif mavjud emas.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Muallif Nomi</th>
                    <th>Email</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">Ko'rish</a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline-block;">
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
