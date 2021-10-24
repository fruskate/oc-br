<?php namespace Frukt\Books\Console;

use Frukt\Books\Imports\CirculationsImport;
use Frukt\Books\Imports\BooksImportCollect;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Excel;

class ImportCirculations extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'import:circulations';

    /**
     * @var string The console command description.
     */
    protected $description = 'Импорт таблицы с заказами или простыми добавлениями';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $this->output->title('Начало импорта');
        (new CirculationsImport())->withOutput($this->output)->import('plugins/frukt/books/assets/xlsx/circulations.xlsx');
        $this->output->success('Импорт завершён');
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
