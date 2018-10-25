<?php

use Illuminate\Database\Seeder;

class catesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cates')->insert([
        	[
	            'name' => 'Art & Music',
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	            'name' => 'Biographies',
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	           'name' => 'Business',
	            'created_at'=>new DateTime()
	            
	        ],
	        [
	            'name' => 'Kids',
	            'created_at'=>new DateTime()
	            
	        ]

        ]
	        
    	);
    }
}
