<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country_code')->unique();
            $table->timestamps();
        });

        DB::table('countries')->insert(array('name' => 'Colombia', 'country_code' => 'CO'));
        DB::table('countries')->insert(array('name' => 'Argentina', 'country_code' => 'AR'));
        DB::table('countries')->insert(array('name' => 'Brasil', 'country_code' => 'BR'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('countries');
    }

}
