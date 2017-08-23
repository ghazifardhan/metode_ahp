<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCriteriaComparison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_kriteria', function(Blueprint $table){
          $table->increments('id');
          $table->integer('kriteria_id_1')->unsigned();
          $table->integer('kriteria_id_2')->unsigned();
          $table->integer('nilai');

          $table->foreign('kriteria_id_1')->references('id')->on('kriteria')->onDelete('cascade');
          $table->foreign('kriteria_id_2')->references('id')->on('kriteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('perbandingan_kriteria');
    }
}
