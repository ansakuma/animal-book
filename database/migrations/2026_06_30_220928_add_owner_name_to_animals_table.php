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
        Schema::table('animals', function (Blueprint $table) {
            // 💡 好きな飼い主名（文字）を保存できる列を追加します。
            // after('name') をつけることで、データベース上も「名前」のすぐ後ろに配置されて見やすくなります。
            $table->string('owner_name')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn('owner_name');
        });
    }
};
