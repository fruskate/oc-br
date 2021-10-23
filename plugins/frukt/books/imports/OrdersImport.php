<?php namespace Frukt\Books\Imports;

use Frukt\Books\Models\Author;
use Frukt\Books\Models\Book;
use Frukt\Books\Models\Language;
use Frukt\Books\Models\Order;
use Frukt\Books\Models\Person;
use Frukt\Books\Models\Place;
use Frukt\Books\Models\Publisher;
use Frukt\Books\Models\Rubric;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class OrdersImport implements ToModel, WithProgressBar, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {

        if ($row[0]) { // Если есть поле со ссылкой на книгу - импортим действие по ней.

            $book_id = substr($row[0], 30);
            $book_id = substr($book_id,0,-1);

            //trace_log($book_id);

            $book = Book::where('mos_id', $book_id)->first();

            if ($book) {
                Order::create([
                    'book_id' => $book->id,
                    'user_id' => $row[3],
                    'event' => $row[1]
                ]);
            }

        }
    }

    public function chunkSize(): int
    {
        return 500;
    }
}
