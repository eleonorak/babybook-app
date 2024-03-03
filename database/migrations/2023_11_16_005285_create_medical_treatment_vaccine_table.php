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
        Schema::create('medical_treatment_vaccine', function (Blueprint $table) {
            $table->foreignId('vaccine_id');
            $table->foreignId('medical_treatment_id');
        });
        Schema::table('medical_treatment_vaccine', function(Blueprint $table){
            $table->foreign('vaccine_id')->references('id')->on('vaccines')->cascadeOnDelete();
            $table->foreign('medical_treatment_id')->references('id')->on('medical_treatments')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_treatment_vaccine');
    }
};
