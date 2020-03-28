<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Provinces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
        });

        Schema::create('regencies', function (Blueprint $table) {
            $table->bigIncrements('id', 25);
            $table->unsignedBigInteger('province_id');
            $table->string('name');
            $table->foreign('province_id')->references('id')->on('provinces');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->bigIncrements('id', 25);
            $table->unsignedBigInteger('regency_id');
            $table->string('name');
            $table->foreign('regency_id')->references('id')->on('regencies');
        });

        Schema::create('villages', function (Blueprint $table) {
            $table->bigIncrements('id', 25);
            $table->unsignedBigInteger('district_id');
            $table->string('name');
            $table->foreign('district_id')->references('id')->on('districts');
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
