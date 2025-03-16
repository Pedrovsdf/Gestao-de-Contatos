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
        Schema::table('contatos', function (Blueprint $table) {
            $table->string('status')->default('ativo'); // Adiciona o campo 'status'
        });
    }

    public function down()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropColumn('status'); // Remove o campo 'status' se a migration for revertida
        });
    }
};
