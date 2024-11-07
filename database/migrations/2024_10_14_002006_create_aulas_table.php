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
        Schema::create('aulas', function (Blueprint $table) {
            $table->id();
            $table->date('data_aula');
            $table->foreignId('aluno_id')->constrained('alunos');
            $table->foreignId('servico_id')->constrained('servicos');
            $table->foreignId('feedback_id')->nullable()->constrained('feedback');
            $table->foreignId('pagamento_id')->nullable()->constrained('pagamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aulas');
    }
};
