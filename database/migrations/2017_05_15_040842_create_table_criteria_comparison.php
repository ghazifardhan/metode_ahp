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
        Schema::create('criteria_comparison', function(Blueprint $table){
          $table->increments('id');
          $table->integer('criteria_id_1')->unsigned();
          $table->integer('criteria_id_2')->unsigned();
          $table->integer('value');

          $table->foreign('criteria_id_1')->references('id')->on('criteria')->onDelete('cascade');
          $table->foreign('criteria_id_2')->references('id')->on('criteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('criteria_comparison');
    }
}
