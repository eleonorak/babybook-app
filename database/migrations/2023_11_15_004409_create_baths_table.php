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
        Schema::create('baths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id');
            $table->dateTime('date');
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('baths',function (Blueprint $table){
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baths');
    }
};
