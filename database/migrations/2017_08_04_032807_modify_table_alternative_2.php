<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyTableAlternative2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternative', function($table){
          $table->dropColumn('age');

          $table->date('birthdate')->nullable()->default('1900-01-01')->after('updated_at');
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
          $table->dropColumn('birthdate');

          $table->integer('age');
        });
    }
}
