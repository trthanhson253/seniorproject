<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	[
	            'name' => 'sub-admin',
	            'password' => bcrypt('123456'),
	            'email' => 'a@gmail.com',
	            'level' => 1 ,
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	            'name' => 'admin',
	            'password' => bcrypt('123456'),
	            'email' => 'b@gmail.com',
	            'level' => 1 ,
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	            'name' => 'member',
	            'password' => bcrypt('123456'),
	            'email' => 'c@gmail.com',
	            'level' => 2 ,
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	            'name' => 'user',
	            'password' => bcrypt('123456'),
	            'email' => 'c@gmail.com',
	            'level' => 2 ,
	            'created_at'=>new DateTime()
	            
	        ]

        ]
	        
    	);
    }
}
