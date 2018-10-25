<?php

use Illuminate\Database\Seeder;

class subcatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcates')->insert([
        	['name' => 'Art History','idCates' => '1','created_at'=>new DateTime()],
        	['name' => 'Drawing','idCates' => '1','created_at'=>new DateTime()],
        	['name' => 'Fashion','idCates' => '1','created_at'=>new DateTime()],
        	['name' => 'Historical','idCates' => '2','created_at'=>new DateTime()],
        	['name' => 'Military','idCates' => '2','created_at'=>new DateTime()],
          ['name' => 'Finance','idCates' => '3','created_at'=>new DateTime()],
        	['name' => 'Economics','idCates' => '3','created_at'=>new DateTime()],
        	['name' => 'Animals','idCates' => '4','created_at'=>new DateTime()],
        	['name' => 'Adventures','idCates' => '4','created_at'=>new DateTime()],
	        
        ]
	        
    	);
    }
}
