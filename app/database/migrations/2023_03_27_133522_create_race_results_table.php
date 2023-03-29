<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('first_place');
            $table->integer('second_place');
            $table->integer('third_place');
            $table->integer('win');
            $table->integer('multiple_wins');
            $table->integer('wide');
            $table->integer('baren');
            $table->integer('horse_single');
            $table->integer('triplets');
            $table->integer('trio');
            $table->integer('result_registration_id');
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
        Schema::dropIfExists('race_results');
    }
}
