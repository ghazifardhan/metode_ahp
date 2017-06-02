<?php

use Illuminate\Database\Seeder;

class table_random_consitency_index extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random_consistency_index = array(
		  array('id' => '1','total_index' => '1','index_value' => '0.00','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '2','total_index' => '2','index_value' => '0.00','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '3','total_index' => '3','index_value' => '0.58','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '4','total_index' => '4','index_value' => '0.90','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '5','total_index' => '5','index_value' => '1.12','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '6','total_index' => '6','index_value' => '1.24','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '7','total_index' => '7','index_value' => '1.32','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '8','total_index' => '8','index_value' => '1.41','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '9','total_index' => '9','index_value' => '1.45','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '10','total_index' => '10','index_value' => '1.49','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '11','total_index' => '11','index_value' => '1.51','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '12','total_index' => '12','index_value' => '1.48','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '13','total_index' => '13','index_value' => '1.56','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '14','total_index' => '14','index_value' => '1.57','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17'),
		  array('id' => '15','total_index' => '15','index_value' => '1.59','created_at' => '2017-05-16 16:10:17','updated_at' => '2017-05-16 16:10:17')
		);

		DB::table('random_consistency_index')->insert($random_consistency_index);
	}
}
