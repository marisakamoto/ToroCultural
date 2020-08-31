<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class AddCategorias extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([ "categoria" => "Arte"]);
        Categoria::create([ "categoria" => "Fotografia" ]);
        Categoria::create([ "categoria" => "Música" ]);
        Categoria::create([ "categoria" => "Show" ]);
        Categoria::create([ "categoria" => "Filme" ]);
        Categoria::create([ "categoria" => "Exibição" ]);
        Categoria::create([ "categoria" => "Culinária" ]);
        Categoria::create([ "categoria" => "Exposição" ]);
        Categoria::create([ "categoria" => "Dança" ]);
        Categoria::create([ "categoria" => "Teatro" ]);
        Categoria::create([ "categoria" => "Cinema" ]);
    }
}
