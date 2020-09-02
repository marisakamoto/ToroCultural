<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddHabilidadesVagas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('habilidade_vaga')->insert([
            [
                  "habilidade_id" => 1,
                  "vaga_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 2,
                  "vaga_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 5,
                  "vaga_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 6,
                  "vaga_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 3,
                  "vaga_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 4,
                  "vaga_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 5,
                  "vaga_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 8,
                  "vaga_id" => 4,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 7,
                  "vaga_id" => 4,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "habilidade_id" => 1,
                  "vaga_id" => 4,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
      ]);
    }
}
