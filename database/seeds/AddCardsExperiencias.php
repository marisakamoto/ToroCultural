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
            "titulo" => "Show Beneficente no sesc Pinheiros",
            'descricao' => "Show voltado para crianças de todas as idades. Contará com a participação da banda Melhor Show Do Mundo",
            "localizacao" => "Sesc Pinheiros",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);

        Experience_card::create([
            "user_id" => 6,
            "titulo" => "Teste",
            'descricao' => "teste",
            "localizacao" => "teste",
            'data_realizacao' => Carbon::create('2000', '01', '01'),
            'url_foto' => "/img/projetos/projeto1.jpg"
        ]);
    }
}
