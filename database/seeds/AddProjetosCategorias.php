<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProjetosCategorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('projeto_categoria')->insert([
            [
                  "projeto_id" => 1,
                  "categoria_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ], 
            [
                  "projeto_id" => 1,
                  "categoria_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 1,
                  "categoria_id" => 8,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 2,
                  "categoria_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 2,
                  "categoria_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 2,
                  "categoria_id" => 6,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 1,
                  "categoria_id" => 7,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "projeto_id" => 5,
                  "categoria_id" => 6,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
      ]);
    }
}
