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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');    /* いいねしたユーザーのID */
            $table->foreignId('animal_id')->constrained()->onDelete('cascade');  /* いいねされたアニマルのID */
            $table->timestamps();
            $table->unique(['user_id', 'animal_id']);/* 同じ人が同じアニマルに2回以上いいねできないように制限 */
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
