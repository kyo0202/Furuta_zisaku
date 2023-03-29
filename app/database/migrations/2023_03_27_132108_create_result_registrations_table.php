<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsult_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('place');
            $table->integer('race_name');
            $table->integer('idevtification');
            $table->integer('number');
            $table->integer('amount');
            $table->integer('race_result_id');
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
        Schema::dropIfExists('table');
    }
}
