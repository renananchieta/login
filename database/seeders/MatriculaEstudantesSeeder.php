<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaEstudantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $itens = [];
        $estudanteId = 1;

        for ($i = 1; $i <= 10; $i++) { // Loop through 10 schools
            for ($j = 1; $j <= 10; $j++) { // Assign 10 students to each school
                $itens[] = [
                    "escola_id" => $i,
                    "estudante_id" => $estudanteId,
                    "matricula" => $faker->unique()->numberBetween(100000000, 999999999),
                    "created_at" => Carbon::now(),
                ];
                $estudanteId++;
            }
        }

        DB::table('matricula_estudante')->insert($itens);
        DB::statement("ALTER TABLE matricula_estudante AUTO_INCREMENT = 101;");//
    }
}
