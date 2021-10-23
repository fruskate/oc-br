<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksRatings extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_ratings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('user_id')->nullable();
            $table->integer('book_id')->nullable();
            $table->decimal('rating', 14, 4)->default(0.0000);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('frukt_books_ratings');
    }
}
