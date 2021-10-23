<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksUsers extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('frukt_books_users');
    }
}
