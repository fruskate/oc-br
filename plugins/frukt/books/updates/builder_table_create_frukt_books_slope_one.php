<?php namespace Frukt\Books\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFruktBooksSlopeOne extends Migration
{
    public function up()
    {
        Schema::create('frukt_books_slope_one', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('item_id1');
            $table->integer('item_id2');
            $table->integer('times');
            $table->decimal('rating', 14, 4);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('frukt_books_slope_one');
    }
}
