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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // 名前
            $table->string('image')->nullable();       // 写真
            $table->string('breed');        // 種類
            $table->text('personality');    // 性格
            $table->text('skill');          // 特技
            $table->foreignId('user_id')
                    ->constrained()
                    ->onDelete('cascade');// onDelete('cascade')ユーザーが削除されたらその人の投稿も削除する
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
