<?php

use Illuminate\Database\Seeder;

class TurmaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('turma')->insert([
        [
          'idturma' => 'AAAAAA',
          'idProfessor' => '2',
          'disciplina' => 'VAI CARAIO',
          'foto_fundo' => 'default'
        ]
      ]);
    }
}
