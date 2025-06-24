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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('net_a_payer');
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('pay_period_id')->nullable();
            $table->boolean('paye')->default(false);
            $table->integer('salaire_brut');
            $table->integer('total_gains');
            $table->integer('total_retenues');
            $table->foreignId('matricule_id');
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
