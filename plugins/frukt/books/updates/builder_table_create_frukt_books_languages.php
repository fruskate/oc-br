<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksLanguages extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_languages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
            $table->string('name_short')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('frukt_books_languages');
    }
}
