<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditAllTableAddCreatedUpdatedBy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alternative', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('assessment_criteria', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('assessment_summary', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('criteria', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('criteria_comparison', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('data_alternative', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('division', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('importance_level', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('random_consistency_index', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('rank_salary', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

          $table->foreign('created_by')->references('id')->on('users');
          $table->foreign('updated_by')->references('id')->on('users');
        });

        Schema::table('year', function($table){
          $table->integer('created_by')->unsigned()->nullable();
          $table->integer('updated_by')->unsigned()->nullable();

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
      Schema::table('alternative', function($table){
        $table->dropForeign('alternative_created_by_foreign');
        $table->dropForeign('alternative_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('assessment_criteria', function($table){
        $table->dropForeign('assessment_criteria_created_by_foreign');
        $table->dropForeign('assessment_criteria_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('assessment_summary', function($table){
        $table->dropForeign('assessment_summary_created_by_foreign');
        $table->dropForeign('assessment_summary_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('criteria', function($table){
        $table->dropForeign('criteria_created_by_foreign');
        $table->dropForeign('criteria_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('criteria_comparison', function($table){
        $table->dropForeign('criteria_comparison_created_by_foreign');
        $table->dropForeign('criteria_comparison_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('data_alternative', function($table){
        $table->dropForeign('data_alternative_created_by_foreign');
        $table->dropForeign('data_alternative_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('division', function($table){
        $table->dropForeign('division_created_by_foreign');
        $table->dropForeign('division_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('importance_level', function($table){
        $table->dropForeign('importance_level_created_by_foreign');
        $table->dropForeign('importance_level_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('random_consistency_index', function($table){
        $table->dropForeign('random_consistency_index_created_by_foreign');
        $table->dropForeign('random_consistency_index_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('rank_salary', function($table){
        $table->dropForeign('rank_salary_created_by_foreign');
        $table->dropForeign('rank_salary_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });

      Schema::table('year', function($table){
        $table->dropForeign('year_created_by_foreign');
        $table->dropForeign('year_updated_by_foreign');
        $table->dropColumn('created_by');
        $table->dropColumn('updated_by');
      });
    }
}
