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
            "titulo" => "Show de música",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Cinema Para crianças",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Roda cantada",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto01.jpg"
        ]);

        Projeto::create([
            "user_id" => 1,
            "titulo" => "Exibição de arte",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
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
