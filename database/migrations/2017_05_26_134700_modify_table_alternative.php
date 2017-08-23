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
        Schema::table('calon', function($table){
          $table->integer('umur');
          $table->string('alamat');
          $table->string('nomor_hp');
          $table->double('gaji');
          $table->integer('divisi_id')->unsigned();

          $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');
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
