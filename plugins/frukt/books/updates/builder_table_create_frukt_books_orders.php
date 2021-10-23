<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksOrders extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('book_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('event')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('frukt_books_orders');
    }
}
