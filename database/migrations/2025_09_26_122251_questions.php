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
       Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id')->index(); // ref only
            $table->text('text');                            // question text
            $table->json('choices');                         // {"A":"...","B":"...","C":"...","D":"..."}
            $table->char('correct', 1);                      // A|B|C|D
            $table->unsignedSmallInteger('points')->default(1);
            $table->unsignedInteger('order')->default(1)->index();
            $table->timestamps();
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
