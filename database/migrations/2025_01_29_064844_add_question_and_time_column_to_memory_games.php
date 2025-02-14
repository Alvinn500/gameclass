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
        Schema::table('memory_games', function (Blueprint $table) {
            $table->json('questions')->nullable()->after('images');
            $table->string('time')->default("01:00")->after('questions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memory_games', function (Blueprint $table) {
            $table->dropColumn('questions');
            $table->dropColumn('time');
        });
    }
};
