<?php

use Illuminate\Database\Seeder;

class booksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
        	['title' => 'Art History','author' => 'ABC','publisher' => 'PAUL','isbn' => '1234567','price' => '24.2','description' => 'this is a good book','image' => '1.jpg','quantity' => '25','status' => '1','idsubCates' => '1','idUsers' => '1','created_at'=>new DateTime()],
        	['title' => 'Render','author' => 'yuio','publisher' => 'etf ','isbn' => '1234567','price' => '34','description' => 'dfasfdsfa dsafads ','image' => '2.jpg','quantity' => '40','status' => '1','idsubCates' => '2','idUsers' => '3','created_at'=>new DateTime()],
            ['title' => 'Render fadfda','author' => 'upie','publisher' => 'afdsc ','isbn' => '3432432','price' => '2','description' => 'dfasfdsfa dsafads ','image' => '5.jpg','quantity' => '3','status' => '1','idsubCates' => '3','idUsers' => '4','created_at'=>new DateTime()],
            ['title' => 'Render 1245','author' => 'yuio','publisher' => 'etf ','isbn' => '34243243','price' => '34','description' => 'dfasfdsfa dsafads ','image' => '4.jpg','quantity' => '40','status' => '1','idsubCates' => '7','idUsers' => '2','created_at'=>new DateTime()],
            ['title' => 'Render vv','author' => 'yudfasfwerio','publisher' => 'etferwer ','isbn' => '34243ds43','price' => '34','description' => 'dfasfdsfa dsafads ','image' => '3.jpg','quantity' => '40','status' => '1','idsubCates' => '6','idUsers' => '3','created_at'=>new DateTime()],
        	
	        
        ]
	        
    	);
    }
}
