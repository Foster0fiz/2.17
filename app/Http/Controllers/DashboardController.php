<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Загружаем авторов с их книгами и книги с их авторами
        $authors = Author::with('books')->get();
        $books = Book::with('authors')->get();
        return view('dashboard', compact('authors', 'books'));
    }
}
