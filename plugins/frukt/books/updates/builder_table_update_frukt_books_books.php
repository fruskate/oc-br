<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFruktBooksBooks extends Migration
{
    public function up()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->integer('mos_id')->nullable()->unsigned();
            $table->text('annotation')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->dropColumn('mos_id');
            $table->dropColumn('annotation');
        });
    }
}
