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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->date('approved_at')->nullable();
            $table->string('approved_by');
            $table->string('commentaire')->nullable();
            $table->date('date_debut_conger');
            $table->date('date_fin_conger');
            $table->string('type');
            $table->string('motif_conger')->nullable();
            $table->string('justificatif')->nullable();
            $table->string('statut')->nullable();
            $table->foreignId('matricule_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
