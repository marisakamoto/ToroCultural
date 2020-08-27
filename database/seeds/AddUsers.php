<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
class AddUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "João Almeida",
            'username' => "Joal",
            "email" => "joalmeida@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Músico com 5 anos de estrada",
            'url_foto' => "/img/users/homem1.jpg"
        ]);
        User::create([
            "name" => "Maria Carla",
            'username' => "MariaCarla",
            "email" => "mcarla@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Contadora de histórias, formação em clown e cantora lúdica",
            'url_foto' => "/img/users/mulher.jpeg"
        ]);
        User::create([
            "name" => "Ana Lopes",
            'username' => "AninhaLopes",
            "email" => "ana@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Produtora cultural da Filmarte há 3 anos",
            'url_foto' => "/img/users/mulher1.jpg"
        ]);
        User::create([
            "name" => "Carolina Duarte",
            'username' => "CarolDu",
            "email" => "duarte@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Atriz formada pela UFRJ, dançarina contemporânea e amor pela música",
            'url_foto' => "/img/users/mulher 2.jpeg"
        ]);
        User::create([
            "name" => "Joana Maria",
            'username' => "MariaJo",
            "email" => "mjoana@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Contadora de histórias, formação em clown e cantora",
            'url_foto' => "/img/users/mulher.jpeg"
        ]);
        
    }
}
