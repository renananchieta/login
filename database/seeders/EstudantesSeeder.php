<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $itens = [];

        for ($i = 1; $i <= 100; $i++) {
            $itens[] = [
                "id" => $i,
                "nome" => $faker->name,
                "cpf" => $faker->unique()->cpf(false), // CPF sem formatação
                "dt_nascimento" => $faker->date(),
                "nome_mae" => $faker->name('female'),
                "cpf_mae" => $faker->unique()->cpf(false),
                "created_at" => Carbon::now(),
            ];
        } 
        DB::table('estudantes')->insert($itens);
        DB::statement("ALTER TABLE estudantes AUTO_INCREMENT = 101;");
    }
}
