<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFruktBooksBooks3 extends Migration
{
    public function up()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->integer('rate')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->dropColumn('rate');
        });
    }
}