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

        Schema::create('child_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id');
            $table->text('path');
            $table->string('type');
            $table->timestamps();
        });
        Schema::table('child_photos',function (Blueprint $table){
            $table->foreign('child_id')->references('id')->on('children')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('child_photos');
    }
};
