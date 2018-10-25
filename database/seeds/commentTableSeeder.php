<?php

use Illuminate\Database\Seeder;

class commentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment')->insert([
        	['idUser' => '1','idBooks' => '1','content' => 'Great','created_at'=>new DateTime()],
        	['idUser' => '3','idBooks' => '2','content' => 'Good','created_at'=>new DateTime()],
	        ['idUser' => '3','idBooks' => '3','content' => 'Ugly','created_at'=>new DateTime()],
	        ['idUser' => '2','idBooks' => '4','content' => 'Excellent','created_at'=>new DateTime()],
	        ['idUser' => '4','idBooks' => '5','content' => 'No ideas','created_at'=>new DateTime()],
        ]
	        
    	);
    }
}
