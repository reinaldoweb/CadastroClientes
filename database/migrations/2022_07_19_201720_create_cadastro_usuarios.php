<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro_usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 25);
            $table->string("sobreNome", 100);
            $table->string('email', 150);
            $table->string('telefone', 11);
            $table->string('endereco', 255);
            $table->string('idade', 2);
            $table->text('msg');
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
        Schema::dropIfExists('cadastro_usuarios');
    }
};
