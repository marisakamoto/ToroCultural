<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaPivotUserUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     //USUARIO SEGUE OUTRO USUARIO
    public function up()
    {
        Schema::create('user_userseguindo', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');//Principal 
            $table->foreignId('user_seguindo_id')->constrained("users")->onDelete('cascade');//Quem segue
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
        Schema::dropIfExists('user_userseguindo');
    }
}
