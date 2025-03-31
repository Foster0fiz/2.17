<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Requests\AuthorStoreRequest;
use App\Http\Requests\AuthorUpdateRequest;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::with('books')->get();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        $books = Book::all();
        return view('authors.create', compact('books'));
    }

    public function store(AuthorStoreRequest $request)
    {
        $validated = $request->validated();
        
        $author = Author::firstOrCreate(
            ['email' => $validated['email']],
            ['name' => $validated['name'], 'bio' => $validated['bio']]
        );

        if (!empty($validated['books'])) {
            $author->books()->syncWithoutDetaching($validated['books']);
        }

        return redirect()->route('authors.index')
            ->with('success', 'Muallif muvaffaqiyatli qo\'shildi!');
    }

    public function show(Author $author)
    {
        $author->load('books');
        return view('authors.show', compact('author'));
    }

    public function detachBook(Author $author, Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id'
        ]);
        
        $author->books()->detach($request->book_id);
        
        return redirect()->route('authors.show', $author)
            ->with('success', 'Kitob muallifdan ajratildi!');
    }

    public function edit(Author $author)
    {
        $books = Book::all();
        return view('authors.edit', compact('author', 'books'));
    }

    public function update(AuthorUpdateRequest $request, Author $author)
    {
        $validated = $request->validated();
        
        $author->update($validated);

        if (!empty($validated['books'])) {
            $author->books()->sync($validated['books']);
        }

        return redirect()->route('authors.index')
            ->with('success', 'Muallif yangilandi!');
    }

    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')
            ->with('success', 'Muallif o‘chirildi!');
    }
}