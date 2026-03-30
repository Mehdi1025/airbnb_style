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
        Schema::table('users', function (Blueprint $table) {
            // Ajout des colonnes
            $table->string('first_name')->after('id');
            $table->string('last_name')->after('first_name');

            // Suppression de l'ancienne colonne
            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // On remet la colonne "name"
            $table->string('name')->after('id');

            // Et on supprime first_name et last_name
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
};
