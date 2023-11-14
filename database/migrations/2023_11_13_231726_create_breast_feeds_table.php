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

        Schema::create('breast_feeds', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('child_id');
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('breast_feeds',function (Blueprint $table){
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('breast_feeds');
    }
};
