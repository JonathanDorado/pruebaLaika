<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMunicipalitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('municipalities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('city_id');
            $table->timestamps();
        });

        DB::table('municipalities')->insert(array('name' => 'Bogotá', 'city_id' => '1'));
        DB::table('municipalities')->insert(array('name' => 'Soacha', 'city_id' => '1'));
        DB::table('municipalities')->insert(array('name' => 'Medellín', 'city_id' => '2'));
        DB::table('municipalities')->insert(array('name' => 'Guarne', 'city_id' => '2'));
        DB::table('municipalities')->insert(array('name' => 'Barranquilla', 'city_id' => '3'));
        DB::table('municipalities')->insert(array('name' => 'Soledad', 'city_id' => '3'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('municipalities');
    }

}
