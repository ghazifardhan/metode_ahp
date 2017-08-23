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
        Schema::table('calon', function($table){
          $table->dropColumn('umur');

          $table->date('tanggal_lahir')->nullable()->default('1900-01-01')->after('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calon', function($table){
          $table->dropColumn('tanggal_lahir');

          $table->integer('umur');
        });
    }
}
