<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contatos', function (Blueprint $table) {
            $table->id(); // ID (chave primária)
            $table->string('nome'); // nome do contato
            $table->string('telefone'); // telefone
            $table->string('email')->unique(); // e-mail (único)
            $table->text('observacoes')->nullable(); // observações (opcional)
            $table->timestamps(); // created_at e updated_at
            $table->softDeletes(); // deleted_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
