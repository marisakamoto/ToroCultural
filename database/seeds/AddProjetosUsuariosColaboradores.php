<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProjetosUsuariosColaboradores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('projeto_user_colaborador')->insert([
            [
                  "projeto_id" => 1,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 1,
                  "userColaborador_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 2,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 2,
                  "userColaborador_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 3,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 4,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 5,
                  "userColaborador_id" => 4,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 5,
                  "userColaborador_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 6,
                  "userColaborador_id" => 4,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 6,
                  "userColaborador_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 7,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 8,
                  "userColaborador_id" => 6,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 8,
                  "userColaborador_id" => 5,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 9,
                  "userColaborador_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 9,
                  "userColaborador_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],

      ]);
    }
}
