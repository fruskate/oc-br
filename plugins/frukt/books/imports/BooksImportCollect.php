<?php namespace Frukt\Books\Imports;

use Frukt\Books\Models\Author;
use Frukt\Books\Models\Book;
use Frukt\Books\Models\Language;
use Frukt\Books\Models\Person;
use Frukt\Books\Models\Place;
use Frukt\Books\Models\Publisher;
use Frukt\Books\Models\Rubric;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;

class BooksImportCollect implements OnEachRow, WithProgressBar, WithChunkReading
{
    use Importable;

    public function onRow(Row $row)
    {
        if ($row[2]) { // Если у книги есть название - импортируем её
            if ($row[1]) {
                $author = Author::where('name', $row[1])->firstOrCreate(['name' => $row[1]]);
            }

            $book = Book::create([
                'import_id' => $row[0],
                'author_id' => $row[1] ? $author->id : null,
                'title'     => $row[2],
                'year'      => $row[5] ?: null,
                'age'       => $row[12] ?: null
            ]);


            if ($row[6]) {
                $languages = explode(' , ', $row[6]);

                foreach ($languages as $language) {
                    $modelLanguage = Language::where('name_short', $language)->firstOrCreate(['name_short' => $language]);

                    $book->languages()->attach($modelLanguage->id);
                }
            }

            if ($row[8]) {
                $persons = explode(' , ', $row[8]);

                foreach ($persons as $person) {
                    $modelPerson = Person::where('name', $person)->firstOrCreate(['name' => $person]);

                    $book->persons()->attach($modelPerson->id);
                }
            }

            if ($row[3]) {
                $places = explode(' : ', $row[3]);

                foreach ($places as $place) {
                    $modelPlace = Place::where('name', $place)->firstOrCreate(['name' => $place]);

                    $book->places()->attach($modelPlace->id);

                }
            }

            if ($row[4]) {
                $publishers = explode(' , ', $row[4]);

                foreach ($publishers as $publisher) {
                    $modelPublisher = Publisher::where('name', $publisher)->firstOrCreate(['name' => $publisher]);

                    $book->publishers()->attach($modelPublisher->id);

                }
            }

            if ($row[7]) {
                $rubrics = explode(' : ', $row[7]);

                foreach ($rubrics as $rubric) {
                    $modelRubric = Rubric::where('name', $rubric)->firstOrCreate(['name' => $rubric]);

                    $book->rubrics()->attach($modelRubric->id);

                }
            }
        }
    }

    public function chunkSize(): int
    {
        return 5;
    }
}
