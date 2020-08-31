<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPivotUserProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //Usuario segue vários projetos
    public function up()
    {
        Schema::create('user_projetoSeguido', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();//Principal
            $table->foreignId('projeto_id')->constrained();//Seguido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_projetoSeguido');
    }
}
