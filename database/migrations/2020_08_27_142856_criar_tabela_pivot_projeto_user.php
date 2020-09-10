<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPivotProjetoUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    //PROJETO_USUARIO_COLABORADOR -> Um usuario pode trabalhar em vários projetos
    //um projeto pode receceber vários usuários como colaboradores
    //COLABORADORES
    public function up()
    {
        Schema::create('projeto_user_colaborador', function (Blueprint $table) {
            $table->foreignId('projeto_id')->constrained()->onDelete('cascade');
            $table->foreignId('userColaborador_id')->constrained('users');
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
        Schema::dropIfExists('projeto_user_colaborador');
    }
}
