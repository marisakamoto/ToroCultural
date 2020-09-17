<?php

use Illuminate\Database\Seeder;
use App\Habilidade;

class AddHabilidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Habilidade::create([
            "habilidade" => "Fotografia",
        ]);
        Habilidade::create([
            "habilidade" => "Direção",
        ]);
        Habilidade::create([
            "habilidade" => "Atuar",
        ]);
        Habilidade::create([
            "habilidade" => "Edição de imagem",
        ]);
        Habilidade::create([
            "habilidade" => "Edição de vídeo",
        ]);
        Habilidade::create([
            "habilidade" => "Cantar",
        ]);
        Habilidade::create([
            "habilidade" => "Dançar",
        ]);
        Habilidade::create([
            "habilidade" => "Sapateado",
        ]);
        Habilidade::create([
            "habilidade" => "Pintura",
        ]);
        Habilidade::create([
            "habilidade" => "Organização",
        ]);
        Habilidade::create([
            "habilidade" => "Música",
        ]);
        Habilidade::create([
            "habilidade" => "Produção",
        ]);
    }
}