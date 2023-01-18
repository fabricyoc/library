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
        // Tabela emprestar
        Schema::create('livro_user', function (Blueprint $table) {
            $table->id();

            $table->foreignId('livro_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->date('emprestimo');
            $table->date('devolucao');
            $table->boolean('renovacao');
            $table->date('devolucaoRenovacao');

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
        Schema::dropIfExists('livro_user');
    }
};
