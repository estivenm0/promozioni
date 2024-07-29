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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedTinyInteger('category_id');
            $table->string('title', 50);
            $table->string('slug')->unique();
            $table->string('image');
            $table->double('latitude');
            $table->double('longitude');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('branch_id')
            ->references('id')->on('branches')
            ->cascadeOnDelete()->cascadeOnUpdate();

            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions');
    }
};
