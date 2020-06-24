<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('users')->insert([
        [
          'ra' => '1',
          'name' => 'AAAAA',
          'email' => 'oi amigo',
          'password' => '$2y$10$vDcxROnyl6pWI.MdKcAQQOTiXfpiq1yGqA3G78CXhst3j0RiSZr9G',
          'nivel_acesso' => 'admin',
          'foto_perfil' => 'default'
        ],
        [
          'ra' => '13',
          'name' => 'AAAAA1221',
          'email' => 'oi amigoWWW',
          'password' => '$2y$10$vDcxROnyl6pWI.MdKcAQQOTiXfpiq1yGqA3G78CXhst3j0RiSZr9G',
          'nivel_acesso' => 'aluno',
          'foto_perfil' => 'default'

        ],
        [
          'ra' => '12',
          'name' => 'AAAAA22',
          'email' => 'oi amigoqwddwq',
          'password' => '$2y$10$vDcxROnyl6pWI.MdKcAQQOTiXfpiq1yGqA3G78CXhst3j0RiSZr9G',
          'nivel_acesso' => 'professor',
          'foto_perfil' => 'default'

        ]
      ]);
    }
}
