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
          'idTurma' => 'MLMWYH',
          'idAluno' => '9',
          'situacao' => 'aceito',

        ],

        [
          'idTurma' => 'MLMWYH',
          'idAluno' => '10',
          'situacao' => 'aceito',
        ],
        [
          'idTurma' => 'MLMWYH',
          'idAluno' => '11',
          'situacao' => 'aceito',
        ],
        [
          'idTurma' => 'MLMWYH',
          'idAluno' => '12',
          'situacao' => 'aceito',
        ]
      ]);

    }
}
