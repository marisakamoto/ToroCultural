<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaPivotUserProjeto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_projetoSeguido', function (Blueprint $table) {
            $table->foreignId('userSeguindo_id')->constrained('users')->onDelete('cascade');//Principal
            $table->foreignId('projetoSeguido_id')->constrained('projetos')->constrained()->onDelete('cascade');;//Seguido
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
