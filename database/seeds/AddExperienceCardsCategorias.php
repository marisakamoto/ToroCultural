<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddExperienceCardsCategorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('experience_card_categoria')->insert([
            [
                  "experience_card_id" => 1,
                  "categoria_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ], 
            [
                  "experience_card_id" => 1,
                  "categoria_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "experience_card_id" => 2,
                  "categoria_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
      ]);
    }
}
