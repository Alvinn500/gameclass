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
        Schema::table('essay_scores', function (Blueprint $table) {
            $table->unsignedBigInteger("class_id")->after("status");
            $table->foreign("class_id")->references("id")->on("class_listings");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('essay_scores', function (Blueprint $table) {
            $table->dropForeign("upload_scores_class_id_foreign");
            $table->dropColumn("class_id");
        });
    }
};
