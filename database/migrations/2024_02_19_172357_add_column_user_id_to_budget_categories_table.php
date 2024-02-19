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
        Schema::table('budget_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('type');

            $table->foreign('user_id')->references('id')->on('user');

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_categories', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
