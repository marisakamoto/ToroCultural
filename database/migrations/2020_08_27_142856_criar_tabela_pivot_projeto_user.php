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
    //PROJETO_USUARIO_COLABORADOR -> Usuario trabalha em vários projetos
    //o projeto rececebe vários usuários como colaboradores
    public function up()
    {
        Schema::create('projeto_user', function (Blueprint $table) {
            $table->foreignId('projeto_id')->constrained();
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('projeto_user');
    }
}
