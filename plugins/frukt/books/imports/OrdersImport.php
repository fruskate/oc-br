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

class OrdersImport implements ToModel, WithProgressBar, WithChunkReading
{
    use Importable;

    public function model(array $row)
    {
        if ($row[0]) { // Если есть поле со ссылкой на книгу - импортим действие по ней.

            $book_id = substr($row[0], 30);
            $book_id = substr($book_id,0,-1);

            $book = Book::where('mos_id', $book_id)->first();
            $user = User::where('id', $row[3])->firstOrCreate(['id' => $row[3]]);

            if (!$book) {
                $book = Book::create([
                    'title' => $book_id,
                    'mos_id' => $book_id,
                    'annotation' => '<a href="https://www.mos.ru/knigi/book/"'.$book_id.'>Посмотреть на сайте MOS.RU</a>'
                ]);
            }

            Order::create([
                'book_id' => $book->id,
                'user_id' => $user->id,
                'event' => $row[1],
                'created_at' => Carbon::parse($this->toNormalDate($row[2])),
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
