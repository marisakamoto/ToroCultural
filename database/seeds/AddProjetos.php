<?php

use Illuminate\Database\Seeder;
use App\Projeto;
use Carbon\Carbon;

class AddProjetos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Show Beneficente no sesc Pinheiros",
            'descricao' => "Show voltado para crianças de todas as idades. Contará com a participação da banda Melhor Show Do Mundo",
            "localizacao" => "Sesc Pinheiros",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto01.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Cinema Para crianças",
            'descricao' => "E se a gente saísse de casa para ir ao cinema, mas ao invés de uma sala, fossemos para um gramado? Uma sessão de cinema com muitas novidades ao ar livre.",
            "localizacao" => "Centro de São Paulo",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/Shell-Open-Air-Alexandre-Woloch-1-1024x684.jpg"
        ]);

        Projeto::create([
            "user_id" => 1,
            "titulo" => "Exibição de arte",
            'descricao' => "O exibição de arte, é um evento que veio para provar que arte tem várias formas, modelos e culturas.
            Exibições de diversos talentos em uma linda noite cercada de grande nomes. ",
            "localizacao" => "Maresias",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/festivais-de-musica-no-brasil-guiche-virtual.jpg"
        ]);

        Projeto::create([
            "user_id" => 2,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto01.jpg"
        ]);

        Projeto::create([
            "user_id" => 3,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
        ]);

        Projeto::create([
            "user_id" => 4,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto01.jpg"
        ]);

        Projeto::create([
            "user_id" => 5,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
        ]);
    }
}
