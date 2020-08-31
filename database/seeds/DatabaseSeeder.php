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
        $this->call(AddPublishes::class);
        $this->call(AddProjetosCategorias::class);
        $this->call(AddExperienceCardsCategorias::class);
        $this->call(AddUserProjetoSeguindo::class);
        $this->call(AddProjetosUsuariosColaboradores::class);
        $this->call(AddUsersUsersSeguindo::class);
    }
}
