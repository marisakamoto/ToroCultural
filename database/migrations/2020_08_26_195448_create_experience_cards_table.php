<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); 
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->text('localizacao')->nullable();
            $table->date('data_realizacao')->nullable();
            $table->string('url_foto')->nullable();
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
        Schema::dropIfExists('experience_cards');
    }
}
