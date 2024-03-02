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
        Schema::create('feedings', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('child_id');
            $table->foreignId('feeding_type_id');
            $table->decimal('quantity')->nullable();
            $table->foreignId('unit_id')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
        Schema::table('feedings',function (Blueprint $table){
            $table->foreign('feeding_type_id')->references('id')->on('feeding_types')->cascadeOnDelete();
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->cascadeOnDelete();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedings');
    }
};
