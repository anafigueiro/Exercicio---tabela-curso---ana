<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /*Run the database seeds*/
    public function run(): void
    {
        $fake = Faker::create("pt_BR");
        foreach(range(1,5) as $index){
            DB::table('curso')->insert(
                ['nome'=>$fake->nome,
                 'requisito'=>$fake->requisito,
                 'carga_horario'=>$fake->carga_horario,
                 'valor'=>$fake->valor,
                ]
            );
        }
    }
}
