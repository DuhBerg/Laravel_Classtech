<?php

use Illuminate\Database\Seeder;

class SalaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('salas')->insert([
        [
          'idTurma' => 'AAAAAA',
          'idAluno' => '2',
          'situacao' => 'oi amigo',

        ]
      ]); 

    }
}
