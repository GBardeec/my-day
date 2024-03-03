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
        Schema::create('budget_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('type');
            $table->unsignedBigInteger('budget_category_id');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->timestamps();

            $table->foreign('budget_category_id')->references('id')->on('budget_categories');

            $table->index('budget_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_plans');
    }
};
