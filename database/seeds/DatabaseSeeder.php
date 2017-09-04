<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(table_importance_level::class);
        //$this->call(TableRCISeeder::class);
        //$this->call(SeederTableCalon::class);
        //$this->call(SeederTableCriteria::class);
        $this->call(SeederTableDataCalon::class);
        $this->call(SeederTablePerbandinganKriteria::class);
    }
}
