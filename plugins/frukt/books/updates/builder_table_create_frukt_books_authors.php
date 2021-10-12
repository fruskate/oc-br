<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksAuthors extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_authors', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('frukt_books_authors');
    }
}
