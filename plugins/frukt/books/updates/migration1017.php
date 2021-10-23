<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1017 extends Migration
{
    public function up()
    {
        Schema::create('mm_book_user', function($table)
        {
            $table->integer('user_id')->unsigned();
            $table->integer('book_id')->unsigned();
            $table->primary(['user_id', 'book_id']);
            $table->string('event')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('mm_book_user');
    }
}