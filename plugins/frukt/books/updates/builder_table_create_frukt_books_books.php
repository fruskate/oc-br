<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksBooks extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_books', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('import_id')->nullable()->unsigned();
            $table->integer('author_id')->nullable()->unsigned();
            $table->string('title')->nullable();
            $table->string('year')->nullable();
            $table->string('age')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('frukt_books_books');
    }
}