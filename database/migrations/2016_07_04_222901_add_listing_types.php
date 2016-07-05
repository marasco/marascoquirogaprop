<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddListingTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::table('listing_types')->insert([
            ['name' => 'Departamentos'],
            ['name' => 'Oficinas'],
            ['name' => 'Casas'],
            ['name' => 'Terrenos'],
            ['name' => 'Locales'],
            ['name' => 'Garages'],
            ['name' => 'Cocheras'],
            ['name' => 'PHs']
        ]);

        Schema::table('listings', function (Blueprint $table) {
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('listing_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
