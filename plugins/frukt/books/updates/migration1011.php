<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1011 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_place', function($table)
        {
            $table->integer('book_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->primary(['book_id', 'place_id']);
        });
    }

    public function down()
    {
        Schema::drop('mm_book_place');
    }
}