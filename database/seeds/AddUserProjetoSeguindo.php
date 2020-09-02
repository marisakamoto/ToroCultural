<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


//Um usuário pode seguir N projetos e um projeto pode ser seguido por N usuários

class AddUserProjetoSeguindo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('user_projetoSeguido')->insert([
            [
                  "userSeguindo_id" => 6,
                  "projetoSeguido_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 6,
                  "projetoSeguido_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 1,
                  "projetoSeguido_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 6,
                  "projetoSeguido_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 6,
                  "projetoSeguido_id" => 5,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 2,
                  "projetoSeguido_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 3,
                  "projetoSeguido_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "userSeguindo_id" => 5,
                  "projetoSeguido_id" => 5,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
      ]);
    }
}
