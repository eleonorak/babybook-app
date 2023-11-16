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
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('measurement_type_id');
            $table->double('value');
            $table->dateTime('date');
            $table->foreignId('child_id');
            $table->foreignId('unit_id');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
        Schema::table('measurements',function (Blueprint $table){
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
            $table->foreign('measurement_type_id')->references('id')->on('measurement_types')->cascadeOnDelete();
            $table->foreign('unit_id')->references('id')->on('units')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurements');
    }
};
