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
        $this->call(UserTableSeeder::class);
        $this->call(catesTableSeeder::class);
        $this->call(subcatesTableSeeder::class);
        $this->call(booksTableSeeder::class);
        $this->call(commentTableSeeder::class);
    }
}
