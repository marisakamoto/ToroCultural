<?php

use Illuminate\Database\Seeder;
use App\Publish;

class AddPublishes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publish::create([
            "user_id" => 6,
            "projeto_id" => 6,
            "url_foto" => "/img/publishes/publicacao01.jpg",
            "legenda" => "teste sobre uma legenda para publicação",
        ]);
        Publish::create([
            "user_id" => 6,
            "projeto_id" => 6,
            "url_foto" => "/img/publishes/publicacao01.jpg",
            "legenda" => "teste sobre uma legenda para publicação",
        ]);
        Publish::create([
            "user_id" => 6,
            "projeto_id" => 6,
            "url_foto" => "/img/publishes/publicacao01.jpg",
            "legenda" => "teste sobre uma legenda para publicação",
        ]);
    }
}
