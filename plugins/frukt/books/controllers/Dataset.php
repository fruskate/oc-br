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
}
