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
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_de_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);
    }
}
