<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePairwiseComparison extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pairwise_comparison', function(Blueprint $table){
          $table->increments('id');
          $table->double('t', 8,4);
          $table->double('ci', 8,4);
          $table->integer('rci_id')->unsigned();
          $table->boolean('consistency');
          $table->integer('created_by')->unsigned();
          $table->integer('updated_by')->unsigned();
          $table->timestamps();

          $table->foreign('rci_id')->references('id')->on('random_consistency_index');
          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pairwise_comparison');
    }
}
