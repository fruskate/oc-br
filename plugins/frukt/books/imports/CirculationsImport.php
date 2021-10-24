<?php namespace Frukt\Books\Imports;

use Carbon\Carbon;
use Frukt\Books\Models\Author;
use Frukt\Books\Models\Book;
use Frukt\Books\Models\Language;
use Frukt\Books\Models\Order;
use Frukt\Books\Models\Person;
use Frukt\Books\Models\Place;
use Frukt\Books\Models\Publisher;
use Frukt\Books\Models\Rubric;
use Frukt\Books\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class CirculationsImport implements ToModel, WithProgressBar, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {
        if ($row[1]) { // Если есть поле со ссылкой на книгу - импортим действие по ней.

            $book_id = $row[1];


            $book = Book::where('mos_id', $book_id)->first();
            $user = User::where('id', $row[5])->firstOrCreate(['id' => $row[5]]);

            if (!$book) {
                $book = Book::create([
                    'title' => $book_id,
                    'mos_id' => $book_id
                ]);
            }

            Order::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
                'event' => 'create_order',
                'created_at' => Carbon::parse($this->toNormalDate($row[3])),
            ]);


        }
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function toNormalDate($date)
    {
        return ($date - 25569) * 86400;
    }
}
