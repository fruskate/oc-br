<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFruktBooksBooks2 extends Migration
{
    public function up()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->integer('total_out_count')->default(0);
            $table->integer('total_inplace_count')->default(0);
            $table->integer('free_count')->default(0);
            $table->integer('free_hands')->default(0);
            $table->integer('free_online')->default(0);
            $table->integer('ordered_count')->default(0);
            $table->integer('output_count')->default(0);
            $table->integer('available')->default(0);
        });
    }
    
    public function down()
    {
        Schema::table('frukt_books_books', function($table)
        {
            $table->dropColumn('total_out_count');
            $table->dropColumn('total_inplace_count');
            $table->dropColumn('free_count');
            $table->dropColumn('free_hands');
            $table->dropColumn('free_online');
            $table->dropColumn('ordered_count');
            $table->dropColumn('output_count');
            $table->dropColumn('available');
        });
    }
}
