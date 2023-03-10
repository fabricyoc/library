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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();

            $table->string('autor');
            $table->string('titulo');
            $table->string('slug');
            $table->string('assunto');
            $table->date('dataAquisicao');
            $table->integer('totLivro');
            $table->integer('emprestimo');
            $table->string('numPropria')->unique()->nullable();
            $table->string('imagem')->nullable();
            $table->string('genero')->nullable();
            $table->string('nacionalidade')->nullable();

            $table->timestamps();
        });

        // tabela pivot (EMPRESTAR) no singular e em ordem alfabética
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
            // $table->date('emprestimo'); // data do empréstimo
            $table->date('devolucao'); // data da devolução
            $table->boolean('renovacao')->default(false); // já renovou? se não, + 15 dias

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
        Schema::dropIfExists('livros');
        Schema::dropIfExists('livro_user');
    }
};
