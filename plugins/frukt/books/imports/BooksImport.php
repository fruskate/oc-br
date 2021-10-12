<?php namespace Frukt\Books\Imports;

use Frukt\Books\Models\Author;
use Frukt\Books\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BooksImport implements ToModel
{
    public function model(array $row)
    {
        if ($row[1]) {
            $author = Author::where('name', $row[1])->firstOrCreate(['name' => $row[1]]);
        }

        $book = new Book();
        $book->import_id = $row[0];
        $book->author_id = $row[1]? $author->id : null;
        $book->title = $row[2];
        $book->year = $row[5]? : null;
        $book->age = $row[12]? : null;
        $book->save();


        return $book;
    }
}
