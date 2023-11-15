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


        Schema::create('bottle_feeds', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('child_id');
            $table->decimal('quantity');
            $table->foreignId('unit_id');
            $table->string('notes')->nullable();
            $table->timestamps();
        });

        Schema::table('bottle_feeds',function (Blueprint $table){
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bottle_feeds');
    }
};