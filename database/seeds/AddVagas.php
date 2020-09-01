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
            "descricao" => "Durante todos os sábados de novembro, teremos uma exposição do  Masp, que contará a história dos principais pintores e Italianos.
            Precisamos de um(a) fotógrafo(a) que possa trabalhar todos os sábados, das 12:00h às 17:00h cobrindo o evento e coquete. ",
            "status" => "Teste",
            "projeto_id" => 1
        ]);
        Vaga::create([
            "titulo" => "Teste",
            "descricao" => "Durante todos os sábados de novembro, teremos uma exposição do Masp, que contará a história dos principais pintores e Italianos.
            Precisamos de um(a) fotógrafo(a) que possa trabalhar todos os sábados, das 12:00h às 17:00h cobrindo o evento e coquete. ",
            "status" => "Teste",
            "projeto_id" => 2
        ]);
        Vaga::create([
            "titulo" => "Pianista",
            "descricao" => "Tocará durante o mês de Dezembro, três dias por semana (Sexta, sábado e Domingo) em frente ao shopping D. Pianista com experiência profissional de 1 ano, pelo menos",
            "status" => "Teste",
            "projeto_id" => 3
        ]);
        Vaga::create([
            "titulo" => "Organizador",
            "descricao" => "Organizador com experiência em exibições de arte de rua. Trabalhará com time focado e será responsável pelo acolhimento dos artiostas, por buscar fornecedores, organizar e distribuir tarefas e entrega do evento.",
            "status" => "Teste",
            "projeto_id" => 4
        ]);
    }
}

