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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();
            $table->string('banque');
            $table->string('numero_compte')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('photo')->nullable();
            $table->string('sexe')->nullable();
            $table->string('situation_matrimoniale')->nullable();
            $table->date('date_de_naissance')->nullable();
            $table->date('date_embauche')->nullable();
            $table->foreignId('contrat_id');
            $table->foreignId('department_id');
            $table->foreignId('poste_id');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
