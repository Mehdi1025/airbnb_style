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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('lieu_exact');
            $table->decimal('surface', 8, 2); // Surface en m² avec 2 décimales
            $table->enum('type', ['studio', 'F1', 'F2', 'F3', 'F4', 'F5']);
            $table->decimal('prix', 10, 2); // Prix avec 2 décimales
            $table->decimal('rate', 3, 1); // Note sur 5 avec 1 décimale
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            // Index pour améliorer les performances
            $table->index(['user_id', 'type']);
            $table->index('prix');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
