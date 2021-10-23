<?php namespace Frukt\Books\Console;

use Frukt\Books\Models\Book;
use Illuminate\Console\Command;

class ImportBooks extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'import:books';

    /**
     * @var string The console command description.
     */
    protected $description = 'Импорт idшников с books.json ...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->output->title('Начало поиска совпадений');
        $json = file_get_contents(plugins_path('frukt/books/assets/json/books.json'));
        $json = json_decode($json);
        $bar = $this->output->createProgressBar(count($json));
        $noCounter = 0;
        $yesCounter = 0;
        foreach ($json as $item) {
            $bar->advance();
            $book = Book::where('title', $item->title)->first();
            if ($book) {
                $book->mos_id = $item->id;
                $book->annotation = $item->annotation;
                $book->total_out_count = $item->totalOutCount;
                $book->total_inplace_count = $item->totalInplaceCount;
                $book->free_count = $item->freeCount;
                $book->free_hands = $item->freeHands;
                $book->free_online = $item->freeOnline;
                $book->ordered_count = $item->orderedCount;
                $book->output_count = $item->outputCount;
                $book->available = $item->available;
                $book->save();
                $yesCounter++;
            } else {
                $noCounter++;
            }
            unset($book);
        }
        $bar->finish();
        $this->output->success('Импорт завершён. Обновлено книг '.$yesCounter.'. Не найдено в базе '.$noCounter.'.');
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
