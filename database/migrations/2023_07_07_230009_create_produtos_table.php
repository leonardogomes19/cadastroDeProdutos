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
        Schema::create('tb_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigoID'); //código de identificação
            $table->string('nome'); //nome do produto
            $table->string('linkImg'); //link da imagem do produto
            $table->decimal('preco'); //preço do produto
            $table->string('CEP'); //cep do produto
            $table->softDeletes();
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
        Schema::dropIfExists('tb_produtos');
    }
};
