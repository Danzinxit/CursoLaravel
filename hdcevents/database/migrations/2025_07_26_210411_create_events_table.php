<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->text('description');
            $table->string('city');
            $table->boolean("private"); // so aceita 0 e 1
        });
    }
/*     Explicação:
O método up() define as alterações que serão aplicadas ao banco (criar tabela, adicionar coluna, etc.).
O método down() deve conter o código para reverter (desfazer) o que foi feito no up().
Quando você executa:
php artisan migrate:rollback

O Laravel chama o down() da migration para desfazer a última alteração.
 */
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
