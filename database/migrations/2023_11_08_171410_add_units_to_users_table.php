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
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('weight_unit_id')->after("password");
            $table->foreignId('length_unit_id')->after("password");
            $table->foreignId('volume_unit_id')->after("password");
            $table->foreignId('temperature_unit_id')->after("password");
        });

        Schema::table('users', function(Blueprint $table){
            $table->foreign('weight_unit_id')->references('id')->on('units')->restrictOnDelete();
            $table->foreign('length_unit_id')->references("id")->on('units')->restrictOnDelete();
            $table->foreign('volume_unit_id')->references("id")->on('units')->restrictOnDelete();
            $table->foreign('temperature_unit_id')->references("id")->on('units')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
           $table->dropForeign(['weight_unit_id']);
            $table->dropForeign(['length_unit_id']);
            $table->dropForeign(['volume_unit_id']);
            $table->dropForeign(['temperature_unit_id']);
            $table->dropColumn('weight_unit_id');
            $table->dropColumn('length_unit_id');
            $table->dropColumn('volume_unit_id');
            $table->dropColumn('temperature_unit_id');
        });
    }
};
