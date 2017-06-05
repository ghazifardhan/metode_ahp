<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableAlternative extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternative', function($table){
          $table->integer('age');
          $table->string('address');
          $table->string('phone_number');
          $table->double('salary');
          $table->integer('division_id')->unsigned();

          $table->foreign('division_id')->references('id')->on('division')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alternative', function($table){
          $table->dropColumn('age');
          $table->dropColumn('address');
          $table->dropColumn('phone_number');
          $table->dropColumn('salary');
          $table->dropForeign('division_id');
          $table->dropColumn('division_id');
        });
    }
}
