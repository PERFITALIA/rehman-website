<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
 'name' => "Admin",
 'email' => 'admin@admin.com',
 'password' => bcrypt('password'),
        	)
        ));
    }
}
