<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('events')->insert([
        [
          'title' => 'Prova',
          'start' => '2020-06-26 20:00:00',
          'end' => '2020-06-26 22:00:00'
        ],
        [
          'title' => 'Feriado',
          'start' => '2020-06-27',
          'end' => '2020-06-29'
        ]
      ]);

    }
}
