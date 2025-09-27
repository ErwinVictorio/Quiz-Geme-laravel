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
        Schema::create('user_quizzes', function (Blueprint $table) {
            $table->id();   
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('quiz_id')->index();
            $table->unsignedSmallInteger('score')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'quiz_id']); // enforce single row per pair
            $table->index(['quiz_id', 'score']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
