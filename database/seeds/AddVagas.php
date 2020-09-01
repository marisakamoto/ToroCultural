<?php

use Illuminate\Database\Seeder;
use App\Vaga;

class AddVagas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vaga::create([
            "titulo" => "Fotografa para exposição no Masp",
            "descricao" => "Durante todos os sábados de novembro, teremos uma exposição do Masp, que contará a história dos principais pintores e Italianos.
            Precisamos de um(a) fotógrafo(a) que possa trabalhar todos os sábados, das 12:00h às 17:00h cobrindo o evento e coquete. ",
            "status" => "Teste",
            "projeto_id" => 10,
        ]);
    }
}
