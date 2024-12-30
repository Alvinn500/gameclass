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
        Schema::create('class_listings', function (Blueprint $table) {
            $table->id();
            $table->string('study_name');
            $table->string('class');
            $table->string('school_name');
            $table->string('logo_class');
            $table->integer('total_lesson')->default(0);
            $table->integer('total_materi')->default(0);
            $table->integer('total_quiz')->default(0);
            $table->integer('total_student')->default(0);
            $table->integer('joined_student')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_listings');
    }
};
