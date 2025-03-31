<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(BookStoreRequest $request)
    {
        $validated = $request->validated();
        $book = Book::create($validated);
        
        if (!empty($validated['authors'])) {
            $book->authors()->attach($validated['authors']);
        }

        return redirect()->route('books.index')->with('success', 'Kitob muvaffaqiyatli qo\'shildi!');
    }

    public function show(Book $book)
    {
        $book->load('authors');
        return view('books.show', compact('book'));
    }

    public function detachAuthor(Book $book, Request $request)
    {
        $request->validate(['author_id' => 'required|exists:authors,id']);
        
        $book->authors()->detach($request->author_id);
        
        return redirect()->route('books.show', $book)
            ->with('success', 'Muallif kitobdan ajratildi!');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(BookUpdateRequest $request, Book $book)
    {
        $validated = $request->validated();
        $book->update($validated);

        $book->authors()->sync($validated['authors'] ?? []);


        return redirect()->route('books.index')->with('success', 'Kitob yangilandi');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Kitob o‘chirildi');
    }
}
