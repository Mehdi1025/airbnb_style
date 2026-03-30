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
    Schema::table('demande_de_location', function (Blueprint $table) {
        $table->string('email')->unique();
        $table->string('password');
    });
}

public function down(): void
{
    Schema::table('demande_de_location', function (Blueprint $table) {
        $table->dropColumn(['email', 'password']);
    });
}

};
