<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $author1 = Author::create(['name' => 'Джоан Роулинг', 'email' => 'rowling@example.com']);
        $author2 = Author::create(['name' => 'Джордж Мартин', 'email' => 'martin@example.com']);

        $book1 = Book::create(['title' => 'Гарри Поттер', 'description' => 'Книга о волшебнике']);
        $book2 = Book::create(['title' => 'Игра престолов', 'description' => 'Фэнтези роман']);

        // Связываем книги с авторами
        $book1->authors()->attach($author1);
        $book2->authors()->attach($author2);
    }
}
