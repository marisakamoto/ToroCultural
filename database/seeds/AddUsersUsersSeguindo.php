<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddUsersUsersSeguindo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');
        DB::table('user_userSeguindo')->insert([
            [
                  "user_id" => 6,
                  "user_seguindo_id" => 1,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "user_id" => 6,
                  "user_seguindo_id" => 2,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                  "user_id" => 6,
                  "user_seguindo_id" => 3,
                  "created_at" => $now,
                  "updated_at"=> $now
            ],
            [
                "user_id" => 6,
                "user_seguindo_id" => 4,
                "created_at" => $now,
                "updated_at"=> $now
          ],
          [
                "user_id" => 2,
                "user_seguindo_id" => 1,
                "created_at" => $now,
                "updated_at"=> $now
          ],
          [
                "user_id" => 2,
                "user_seguindo_id" => 2,
                "created_at" => $now,
                "updated_at"=> $now
          ],
      ]);
    }
}
