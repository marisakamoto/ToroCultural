<?php

use Illuminate\Database\Seeder;
use App\Experience_card;
use Carbon\Carbon;


class AddCardsExperiencias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Experience_card::create([
            "user_id" => 6,
            "titulo" => "Show Beneficente no Sesc Pinheiros",
            'descricao' => "Show voltado para crianças de todas as idades. Contará com a participação da banda Melhor Show Do Mundo",
            "localizacao" => "Sesc Pinheiros",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto01.jpg"
        ]);

        Experience_card::create([
            "user_id" => 6,
            "titulo" => "Curso de Fotografia na Belas Artes",
            'descricao' => "Concluído curso de fotografia avançada em movimento",
            "localizacao" => "Universidade Belas Artes",
            'data_realizacao' => Carbon::create('2020', '10', '01'),
            'url_foto' => "/img/projetos/18-frases-de-fotografia-que-servem-de-inspiracao-eMania-19-06.jpg"
        ]);

        Experience_card::create([
            "user_id" => 2,
            "titulo" => "Teste",
            'descricao' => "",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto03.jpeg"
        ]);

        Experience_card::create([
            "user_id" => 2,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto02.jpg"
        ]);

        Experience_card::create([
            "user_id" => 3,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Experience_card::create([
            "user_id" => 5,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Experience_card::create([
            "user_id" => 4,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);
    }
}
