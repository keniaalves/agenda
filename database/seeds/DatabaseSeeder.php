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
        // $this->call(UsersTableSeeder::class);

        DB::table('tarefas')->insert([
            'titulo' => str_random(10),
            'descricao' => str_random(10),
            'data' => '12.03.2018',
        ]);
    }
}
