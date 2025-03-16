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
            $table->unsignedBigInteger('user_id'); // Adiciona a coluna user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Define a chave estrangeira
        });
    }

    public function down()
    {
        Schema::table('contatos', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remove a chave estrangeira
            $table->dropColumn('user_id'); // Remove a coluna user_id
        });
    }
};
