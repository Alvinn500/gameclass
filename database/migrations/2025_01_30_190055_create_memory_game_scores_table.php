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
        Schema::create('memory_game_scores', function (Blueprint $table) {
            $table->id();
            $table->integer('score')->default(0);
            $table->integer('XP')->default(0);
            $table->text('comment')->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('id')->on('class_listings')->onDelete('cascade');
            $table->unsignedBigInteger('task_id');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memory_game_scores');
    }
};
