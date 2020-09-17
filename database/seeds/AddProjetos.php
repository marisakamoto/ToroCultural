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
            "titulo" => "O conto da Cigarra",
            'descricao' => "Show voltado para crianças de todas as idades. Contará com a participação da banda Melhor Show Do Mundo",
            "localizacao" => "Cinemateca",
            'data_de_realizacao' => Carbon::create('2021', '03', '01'),
            'url_foto' => "/img/projetos/ocontodacigarra.jpg"
        ]);

        Projeto::create([
            "user_id" => 6,
            "titulo" => "Cinema Para crianças",
            'descricao' => "E se a gente saísse de casa para ir ao cinema, mas ao invés de uma sala, fossemos para um gramado? Uma sessão de cinema com muitas novidades ao ar livre.",
            "localizacao" => "Centro de São Paulo",
            'data_de_realizacao' => Carbon::create('2021', '04', '06'),
            'url_foto' => "/img/projetos/Shell-Open-Air-Alexandre-Woloch-1-1024x684.jpg"
        ]);

        Projeto::create([
            "user_id" => 1,
            "titulo" => "Exibição de arte e música",
            'descricao' => "O exibição de arte e música, é um evento que veio para provar que arte tem várias formas, modelos e culturas.
            Exibições de diversos talentos em uma linda noite cercada de grande nomes e várias obras da música brasileira. ",
            "localizacao" => "Maresias",
            'data_de_realizacao' => Carbon::create('2021', '07', '27'),
            'url_foto' => "/img/projetos/musicaArte.jpeg"
        ]);

        Projeto::create([
            "user_id" => 2,
            "titulo" => "Teatro para a terceira idade",
            'descricao' => "Vamos levar um pouco de alegria para as casas de repouso com espetáculos que remetem aos tempos de juventude de nossos senhores de idade. Durente a peça, ele interagirão no palco a gente! Esse tipo de iniciativa leva frescor e lembranças boas a eles.",
            "localizacao" => "à combonar por apresentação",
            'data_de_realizacao' => Carbon::create('2019', '10', '10'),
            'url_foto' => "/img/projetos/teatro_idoso.jpg"
        ]);

        Projeto::create([
            "user_id" => 3,
            "titulo" => "Produção culinária",
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
            "titulo" => "Banda Paulista no Sesc Pompéia",
            'descricao' => "Convidamos a todos para participarem do nosso novo show no Sesc Pompeia. Tocaremos as antigas que todos gostam e as músicas do novo álbum! Esperamos vocês!",
            "localizacao" => "Sesc Pompeia",
            'data_de_realizacao' => Carbon::create('2020', '01', '12'),
            'url_foto' => "/img/projetos/showsesc.jpg"
        ]);
    }
}
