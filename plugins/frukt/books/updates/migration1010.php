<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1010 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_person', function($table)
        {
            $table->integer('book_id')->unsigned();
            $table->integer('person_id')->unsigned();
            $table->primary(['book_id', 'person_id']);
        });
    }

    public function down()
    {
        Schema::drop('mm_book_person');
    }
}