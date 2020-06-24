<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
           EventTableSeeder::class,
         ]);
         $this->call([
           UserTableSeeder::class,
         ]);
         $this->call([
          TurmaTableSeeder::class,
         ]);
         $this->call([
           SalaTableSeeder::class,
         ]);
    }
}
