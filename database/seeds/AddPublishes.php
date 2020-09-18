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
            "user_id" => 1,
            "projeto_id" => 3,
            "url_foto" => "/img/publishes/arteEMusica.jpg",
            "legenda" => "Arte e música? Com certeza!",
        ]);
        Publish::create([
            "user_id" => 2,
            "projeto_id" => 1,
            "url_foto" => "/img/publishes/cigarra.jpg",
            "legenda" => "Ensaio para a peça!",
        ]);
        Publish::create([
            "user_id" => 3,
            "projeto_id" => 2,
            "url_foto" => "/img/publishes/historia-do-cinema-03.jpg",
            "legenda" => "Olá pessoal, estamos acelerando todos os preparativos para o nosso cineminha!",
        ]);
        Publish::create([
            "user_id" => 3,
            "projeto_id" => 2,
            "url_foto" => "/img/publishes/up_1531942877_gallery.jpg",
            "legenda" => "Nosso festival de música foi um sucesso!!! Lotamos a casa e tivemos muito artistas revelados. @Luiz, @Marisa @Marta, foram alguns dos artistas que estavam conosco e estão aqui no Toró.",
        ]);
    }
}
