<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequenciaEstudantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itens = [];
        $meses = ['02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        for ($i = 1; $i <= 100; $i++) { // Loop through 100 students
            foreach ($meses as $mes) { // Loop through months from February to December
                $itens[] = [
                    "matricula_id" => $i,
                    "ano_referencia" => "2024",
                    "mes_referencia" => $mes,
                    "ch_ofertada" => 160,
                    "ch_presente" => rand(100, 160), // Random value between 100 and 160
                    "created_at" => Carbon::now(),
                ];
            }
        }

        DB::table('frequencia_estudante')->insert($itens);
        DB::statement("ALTER TABLE frequencia_estudante AUTO_INCREMENT = " .  (count($itens) + 1) .";");//
    }
}
