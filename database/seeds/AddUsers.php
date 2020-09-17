<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
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
            'username' => "João",
            "email" => "joalmeida@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Músico há 10 anos.
            Fiz mestrado de música na Alemanha, concluído em dezembro de 2019.
            Atualmente tenho meu próprio grupo musical composto de 6 musicistas.
            Meus principais ritmos são clássicos e MPB.
            ",
            "profissao" => "Musico",
            "aniversario" => Carbon::create('1986', '08', '17'),
            'url_foto' => "/img/users/homem1.jpg"
        ]);
        User::create([
            "name" => "Maria Carla",
            'username' => "MariaCarla",
            "email" => "mcarla@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Fotógrafa há 5 anos.
            O mundo é minha tela e saiu fazendo quadros com os olhos e captando aquilo que o coração pede.",
            "aniversario" => Carbon::create('1994', '03', '15'),
            "profissao" => "Fotógrafa",
            'url_foto' => "/img/users/p000026537.jpg"
        ]);
        User::create([
            "name" => "Ana Lopes",
            'username' => "AninhaLopes",
            "email" => "ana@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Produtora cultural da Filmarte há 3 anos",
            "profissao" => "Produtora",
            "aniversario" => Carbon::create('1970', '09', '09'),
            'url_foto' => "/img/users/mulher1.jpg"
        ]);
        User::create([
            "name" => "Carolina Duarte",
            'username' => "CarolDu",
            "email" => "duarte@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Atriz formada pela UFRJ, dançarina contemporânea e amor pela música",
            "profissao" => "Dançarina",
            "aniversario" => Carbon::create('1990', '05', '15'),
            'url_foto' => "/img/users/mulher 2.jpeg"
        ]);
        User::create([
            "name" => "Joana Maria",
            'username' => "MariaJo",
            "email" => "mjoana@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Contadora de histórias, formação em clown e cantora",
            "profissao" => "Atriz",
            "aniversario" => Carbon::create('1990', '06', '17'),
            'url_foto' => "/img/users/mulher.jpeg"
        ]);

        User::create([
            "name" => "Carla Moraes",
            'username' => "Carlinha",
            "email" => "carla@gmail.com",
            "password"=> Hash::make('123456'),
            'descricao' => "Desde muito novinha eu tinha um sonho, fazer arte!
            Arte na rua, arte no palco, onde houvesse uma pessoa disposta a me ouvir, lá estaria eu fazendo ARTE.
            Formada em arte cênicas pela PUC do Rio e atualmente dirigindo a peça infantil “O conto da Cigarra”.",
            "profissao" => "Artista",
            "aniversario" => Carbon::create('1990', '05', '15'),
            'url_foto' => "/img/users/mulher.jpeg"
        ]);

    }
}
