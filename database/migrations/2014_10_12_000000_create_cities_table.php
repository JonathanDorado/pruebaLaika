<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country_code');
            $table->timestamps();
        });
        
        DB::table('cities')->insert(array('name' => 'Cundinamarca', 'country_code' => 'CO'));
        DB::table('cities')->insert(array('name' => 'Antioquía', 'country_code' => 'CO'));
        DB::table('cities')->insert(array('name' => 'Atlántico', 'country_code' => 'CO'));
        DB::table('cities')->insert(array('name' => 'Ciudad Brasil 1', 'country_code' => 'BR'));
        DB::table('cities')->insert(array('name' => 'Ciudad Brasil 2', 'country_code' => 'BR'));
        DB::table('cities')->insert(array('name' => 'Ciudad Argentina 1', 'country_code' => 'AR'));
        DB::table('cities')->insert(array('name' => 'Ciudad Argentina 2', 'country_code' => 'AR'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
