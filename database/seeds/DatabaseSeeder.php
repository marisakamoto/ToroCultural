<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AddCategorias::class);
        $this->call(AddUsers::class);
        $this->call(AddProjetos::class);
        $this->call(AddCardsExperiencias::class);
    }
}
