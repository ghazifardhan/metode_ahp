<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddYearId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_alternative',function($table){
            $table->integer('year_id')->after('value')->unsigned();
            //$table->foreign('year_id')->references('id')->on('year');
        });

        Schema::table('data_alternative',function($table){
            //$table->integer('year_id')->after('value')->unsigned();
            $table->foreign('year_id')->references('id')->on('year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_alternative',function($table){
            $table->dropColumn('year_id');
            $table->dropForeign('year_id');
        });
    }
}
