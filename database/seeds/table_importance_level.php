<?php

use Illuminate\Database\Seeder;

class table_importance_level extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $importance_level = array(
          array('id'=>'1', 'level_name'=>'Sama Penting Dengan (Nilai=1)', 'level_value'=>'1'),
array('id'=>'2', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=2)', 'level_value'=>'2'),
array('id'=>'3', 'level_name'=>'Sedikit Lebih Penting Dari(Nilai=3)', 'level_value'=>'3'),
array('id'=>'4', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=4)', 'level_value'=>'4'),
array('id'=>'5', 'level_name'=>'Lebih Penting Dari(Nilai=5)', 'level_value'=>'5'),
array('id'=>'6', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=6)', 'level_value'=>'6'),
array('id'=>'7', 'level_name'=>'Lebih Mutlak Penting Dari(Nilai=7)', 'level_value'=>'7'),
array('id'=>'8', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=8)', 'level_value'=>'8'),
array('id'=>'9', 'level_name'=>'Mutlak Penting Dari(Nilai=9)', 'level_value'=>'9'),
array('id'=>'10', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=1/2)', 'level_value'=>'0.5'),
array('id'=>'11', 'level_name'=>'Sedikit Lebih Penting Dari(Nilai=1/3)', 'level_value'=>'0.333333333333333'),
array('id'=>'12', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=1/4)', 'level_value'=>'0.25'),
array('id'=>'13', 'level_name'=>'Lebih Penting Dari(Nilai=1/5)', 'level_value'=>'0.2'),
array('id'=>'14', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=1/6)', 'level_value'=>'0.166666666666667'),
array('id'=>'15', 'level_name'=>'Lebih Mutlak Penting Dari(Nilai=1/7)', 'level_value'=>'0.142857142857143'),
array('id'=>'16', 'level_name'=>'Nilai Berdekatan Dengan (Nilai=1/8)', 'level_value'=>'0.125'),
array('id'=>'17', 'level_name'=>'Mutlak Penting Dari(Nilai=1/9)', 'level_value'=>'0.111111111111111'),

        );

        DB::table('importance_level')->insert($importance_level);
    }
}
