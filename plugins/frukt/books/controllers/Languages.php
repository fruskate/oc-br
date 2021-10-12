<?php namespace Frukt\Books\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Languages extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = [
        'helpers' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Frukt.Books', 'main-menu-item', 'side-menu-item2');
    }
}
