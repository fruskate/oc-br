<?php namespace Frukt\Books;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function register()
    {
        $this->registerConsoleCommand('import:dataset', 'Frukt\Books\Console\ImportDataset');
    }
}
