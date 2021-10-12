<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration109 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_language', function($table)
        {
            $table->integer('book_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->primary(['book_id', 'language_id']);
        });
    }

    public function down()
    {
        Schema::drop('mm_book_language');
    }
}