<?php namespace Frukt\Books\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Excel;
use Frukt\Books\Imports\BooksImport;

/**
 * Dataset Backend Controller
 */
class Dataset extends Controller
{

    /**
     * __construct the controller
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Frukt.Books', 'main-menu-item2', 'side-menu-item2');
    }

    public function index()
    {

    }

    public function onLoadBooksFile()
    {
        Excel::import(new BooksImport, \Input::file('file'));

        return [
            '#answer' => 'Данные успешно загружены. Хорошей работы, о мой повелитель!'
        ];
    }

    public function onLoadBooksJson()
    {
        $json = file_get_contents(plugins_path('frukt/books/assets/json/books.json'));
        $json = json_decode($json);
        trace_log($json);
    }

    public function onMakeModel()
    {
        $items = \DB::table('frukt_books_ratings')->select('book_id')->distinct()->get();

        \DB::table('frukt_books_slope_one')->truncate();

        foreach ($items as $item) {
            $incerts = \Db::select('select a.book_id as item_id1,b.book_id as item_id2,
                                  count(*) as times, sum(a.rating-b.rating) as rating from frukt_books_ratings a, frukt_books_ratings b
                                where a.book_id = '.$item->book_id.' and b.book_id != a.book_id and a.user_id = b.user_id group by a.book_id, b.book_id');

            foreach ($incerts as $incert) {
                \DB::table('frukt_books_slope_one')->insert([
                    'item_id1' => $incert->item_id1,
                    'item_id2' => $incert->item_id2,
                    'times' => $incert->times,
                    'rating' => $incert->rating,
                ]);
            }

        }

    }
}
