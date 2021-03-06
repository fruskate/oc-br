<?php namespace Frukt\Books\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Books extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\RelationController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'books'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Frukt.Books', 'main-menu-item2', 'side-menu-item');
    }
}
