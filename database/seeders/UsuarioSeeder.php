<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $itens = [
            [
                "id" => 1,
                "nome" => "Admin",
                "email" => "admin.user@gmail.com",
                "senha" => Hash::make(12345678),
                "created_at" => Carbon::now(),
            ],
            [
                "id" => 2,
                "nome" => "Renan Anchieta",
                "email" => "renangap18@gmail.com",
                "senha" => Hash::make(12345678),
                "created_at" => Carbon::now(),
            ],
            [
                "id" => 3,
                "nome" => "Teste",
                "email" => "teste@gmail.com",
                "senha" => Hash::make(12345678),
                "created_at" => Carbon::now(),
            ],
        ];
        DB::table('usuarios')->insert($itens);
        DB::statement("ALTER TABLE usuarios AUTO_INCREMENT = 4;");
    }
}
