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
            "vaga_id" => 1,
            "habilidade_id" => 1,
            "created_at" => $now,
            "updated_at"=> $now
      ],
      [
            "vaga_id" => 1,
            "habilidade_id" => 2,
            "created_at" => $now,
            "updated_at"=> $now
      ],
      [
            "vaga_id" => 2,
            "habilidade_id" => 3,
            "created_at" => $now,
            "updated_at"=> $now
      ],
]);
    }
}
