<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableCriteriaComparison2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criteria_comparison',function($table){
            $table->integer('importance_leve_id')->unsigned()->change();

            $table->foreign('importance_leve_id')->references('id')->on('importance_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('criteria_comparison',function($table){
            $table->dropForeign('importance_leve_id');
        });
    }
}
