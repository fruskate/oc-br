<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1012 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_publisher', function($table)
        {
            $table->integer('book_id')->unsigned();
            $table->integer('publisher_id')->unsigned();
            $table->primary(['book_id', 'publisher_id']);
        });
    }

    public function down()
    {
        Schema::drop('mm_book_publisher');
    }
}