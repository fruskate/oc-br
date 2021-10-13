<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1013 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_rubric', function($table)
        {
            $table->integer('book_id')->unsigned();
            $table->integer('rubric_id')->unsigned();
            $table->primary(['book_id', 'rubric_id']);
        });
    }

    public function down()
    {
        Schema::drop('mm_book_rubric');
    }
}