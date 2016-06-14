<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->primary('id');  
            $table->increments('id');
            $table->string('title');
            $table->string('operation')->default('sale');
            $table->mediumText('short_desc');
            $table->longText('long_desc');
            $table->integer('likes')->unsigned();
            $table->string('location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('listings');
    }
}
