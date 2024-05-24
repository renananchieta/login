<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $itens = [];

        for ($i = 1; $i <= 10; $i++) {
            $itens[] = [
                "id" => $i,
                "codigo_escola" => 1000 + $i,
                "codigo_escola_ibge" => rand(1000000, 9999999),
                "nome_escola" => "Escola " . $faker->name() .$i,
                "created_at" => Carbon::now(),
            ];
        }

        DB::table('escolas')->insert($itens);
        DB::statement("ALTER TABLE escolas AUTO_INCREMENT = 11;");
    }
}
