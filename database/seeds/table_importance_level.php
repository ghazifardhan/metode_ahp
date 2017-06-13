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
          array('level_name'=>'Sama Penting Dengan (Nilai=1)', 'level_value'=>'1'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=2)', 'level_value'=>'2'),
array('level_name'=>'Sedikit Lebih Penting Dari(Nilai=3)', 'level_value'=>'3'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=4)', 'level_value'=>'4'),
array('level_name'=>'Lebih Penting Dari(Nilai=5)', 'level_value'=>'5'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=6)', 'level_value'=>'6'),
array('level_name'=>'Lebih Mutlak Penting Dari(Nilai=7)', 'level_value'=>'7'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=8)', 'level_value'=>'8'),
array('level_name'=>'Mutlak Penting Dari(Nilai=9)', 'level_value'=>'9'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=1/2)', 'level_value'=>'0.5'),
array('level_name'=>'Sedikit Lebih Penting Dari(Nilai=1/3)', 'level_value'=>'0.333333333333333'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=1/4)', 'level_value'=>'0.25'),
array('level_name'=>'Lebih Penting Dari(Nilai=1/5)', 'level_value'=>'0.2'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=1/6)', 'level_value'=>'0.166666666666667'),
array('level_name'=>'Lebih Mutlak Penting Dari(Nilai=1/7)', 'level_value'=>'0.142857142857143'),
array('level_name'=>'Nilai Berdekatan Dengan (Nilai=1/8)', 'level_value'=>'0.125'),
array('level_name'=>'Mutlak Penting Dari(Nilai=1/9)', 'level_value'=>'0.111111111111111'),

        );

        DB::table('importance_level')->insert($importance_level);
    }
}
